import { Component, OnInit } from '@angular/core';
import { ToastController, LoadingController, AlertController } from '@ionic/angular';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';
import { FileTransfer, FileUploadOptions, FileTransferObject } from '@ionic-native/file-transfer/ngx';
import { Camera, CameraOptions } from '@ionic-native/camera/ngx';

@Component({
  selector: 'app-feedback',
  templateUrl: './feedback.page.html',
  styleUrls: ['./feedback.page.scss'],
})
export class FeedbackPage implements OnInit {

  feedback;
  imageURI;
  

  constructor(private transfer: FileTransfer, private camera: Camera, public toastCtrl: ToastController, public toastController: ToastController, public alertController: AlertController, private router: Router, private http: HttpClient, public loadingCtrl: LoadingController) { 
    this.feedback = {
      name : "",
      email : "",
      subject : "",
      feedback : "",
      uploadedImage : null
    }
  }

  ngOnInit() {
  }

  async loadingFunction(loadmsg) {
    const loader = await this.loadingCtrl.create({
      message: loadmsg
    })
    return await loader.present();
  }

  validateInputs(){
    if((this.feedback.name) &&
      (this.feedback.email) &&
      (this.feedback.subject) &&
      (this.feedback.feedback) //&&
      //(this.feedback.email) &&
      //(this.feedback.password)
      //(this.newUser.contact)
      )
    {
      return true;
    }
    return false;
  }

  async presentToast(message) {
    const toast = await this.toastController.create({
      message: message,
      duration: 2000
    });
    toast.present();
  }

  async alertShow(pSubHeader){
    const alert = await this.alertController.create({
      header: 'Error',
      subHeader: pSubHeader,
      message: 'Please check your inputs.',
      buttons: ['OK']
    });
    await alert.present();
  }

  async alertShowSuccess(pSubHeader){
    const alert = await this.alertController.create({
      header: 'Success',
      subHeader: pSubHeader,
      buttons: ['OK']
    });
    await alert.present();
  }

  checkEmail(){

    let reg = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(!reg.test(this.feedback.email)){
      this.presentToast("Invalid Email. Please check.");
    }
  }

  getImage() {
    const options: CameraOptions = {
      quality: 100,
      destinationType: this.camera.DestinationType.FILE_URI,
      sourceType: this.camera.PictureSourceType.PHOTOLIBRARY
    }

    this.camera.getPicture(options).then((imageData) => {
      this.imageURI = imageData;

      let loading = this.loadingFunction("Please wait...");

      const fileTransfer: FileTransferObject = this.transfer.create();

      let options: FileUploadOptions = {
        fileKey: 'feedbackImageFile',
        fileName: (Math.floor(Date.now() / 1000)).toString() + ".jpg",
        chunkedMode: false,
        mimeType: "image/jpeg",
        headers: {}
      }

      fileTransfer.upload(this.imageURI, 'http://192.168.1.4/thesis/api/feedback_image.php', options)
        .then((data) => {

          if(data.response.toString() != "error"){
            console.log(data.response);
            //alert(JSON.stringify(data));
            this.feedback.uploadedImage = JSON.parse(data.response).fileName;
            this.presentToast("Image uploaded successfully");
          }
          loading.then(()=>{
            this.loadingCtrl.dismiss();
          });
      }, (err) => {
        console.log(err);
        loading.then(()=>{
          this.loadingCtrl.dismiss();
        });
        this.presentToast(err);
      });
    });
  }

  submit(){
    let loading = this.loadingFunction("Please wait...");

    if(this.validateInputs()){
      const formData = new FormData();
      formData.append('data', JSON.stringify(this.feedback));
      
      this.http.post('http://192.168.1.4/thesis/api/feedback.php', formData, {responseType: 'text'}).subscribe((response) => {
        loading.then(()=>{
          this.loadingCtrl.dismiss();
        });
        if(response.toString() != "error"){
          this.alertShowSuccess("Feedback successfully submited");
          this.router.navigate(['home']);
        }else{
          this.alertShow("Something went wrong");
        }
      });
    }else{
      loading.then(()=>{
        this.loadingCtrl.dismiss();
      });
      this.alertShow("Fill all fields with correct data");
    }
  }

}
