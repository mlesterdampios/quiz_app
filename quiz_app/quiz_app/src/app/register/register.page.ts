import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { ToastController, LoadingController, AlertController } from '@ionic/angular';
import { Router } from '@angular/router';

@Component({
  selector: 'app-register',
  templateUrl: './register.page.html',
  styleUrls: ['./register.page.scss'],
})
export class RegisterPage implements OnInit {
  newUser;
  fName;
  mName;
  lName;
  sections;
  years;

  year;
  section;
  passwordType: string = 'password';
  passwordIcon: string = 'eye-off';
  constructor(public alertController: AlertController, private router: Router,public loadingCtrl: LoadingController, public toastController: ToastController, private http: HttpClient) { 
    
    this.newUser = {
      gender : "",
      college : "",
      mob : "",
      email : "",
      password : ""
    }
    this.years = [7, 8, 9, 10];
    this.sections = {
      7 : [
        'Rizal',
        'Agoncillo',
        'Aguinaldo',
        'Aquino',
        'Bonifacio',
        'Burgos',
        'Dagohoy',
        'Del Pilar',
        'Felipe',
        'Gomez',
        'Jacinto',
        'Lakandula',
        'Lapu-Lapu',
        'Lopez Jaena',
        'Luna',
        'Malvar',
        'Palma',
        'OSPH'
      ],
      8 : [
        'Diamond',
        'Amber',
        'Amethyst',
        'Aquamarine',
        'Beryl',
        'Citrine',
        'Coral',
        'Crystal',
        'Emerald',
        'Garnet',
        'Jade',
        'Onyx',
        'Opal',
        'Pearl',
        'Quartz',
        'Ruby',
        'Sapphire',
        'OSPH'
      
      ],
      9 : [
        'Aluminum',
        'Boron',
        'Carbon',
        'Copper',
        'Hydrogen',
        'Iodine',
        'Iron',
        'Lead',
        'Magnesium',
        'Mercury',
        'Nickel',
        'Nitrogen',
        'Oxygen',
        'Platinum',
        'Potassium',
        'OHSP'
      ],
      10 : [
        'Aristotle',
        'Boyle',
        'Copernicus',
        'Curie',
        'Dalton',
        'Darwin',
        'Descartes',
        'Einstein',
        'Faraday',
        'Fleming',
        'Franklin',
        'Galileo',
        'Hertz',
        'Mendel',
        'Newton',
        'OHSP'
      ]
    }
  }

  ngOnInit() {
  }

  hideShowPassword() {
    this.passwordType = this.passwordType === 'text' ? 'password' : 'text';
    this.passwordIcon = this.passwordIcon === 'eye-off' ? 'eye' : 'eye-off';
  }

  validateInputs(){
    if((this.fName) && (this.mName) && (this.lName) &&
      (this.newUser.gender) &&
      (this.year) && (this.section) &&
      (this.newUser.mob) &&
      (this.newUser.email) &&
      (this.newUser.password)
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
      duration: 2000,
      position: 'middle'
    });
    toast.present();
  }

  checkEmail(){

    let reg = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(reg.test(this.newUser.email)){
      this.http.get('http://192.168.1.4/thesis/api/email_validate.php?email=' + this.newUser.email, { responseType : 'text' }).subscribe((response) => {
        if(response.toString() != "error"){
          this.presentToast("Email already registered. Please check.");
        }else{
          this.presentToast("Congratulations! Email is good to go.");
        }
      });
    }else{
      this.presentToast("Invalid Email. Please check.");
    }
  }

  async loadingFunction(loadmsg) {
    const loader = await this.loadingCtrl.create({
      message: loadmsg
    })
    return await loader.present();
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

  signup(){
    let loading = this.loadingFunction("Please wait...");
    let user = {
      name : this.fName + " " + this.mName + " " + this.lName,
      gender : this.newUser.gender,
      college : "Grade " + this.year + " - " + this.section,
      mob : this.newUser.mob,
      email : this.newUser.email,
      password : this.newUser.password
    };

    if(this.validateInputs()){
      const formData = new FormData();
      formData.append('data', JSON.stringify(user));
      
      this.http.post('http://192.168.1.4/thesis/api/register.php', formData, {responseType: 'text'}).subscribe((response) => {
        loading.then(()=>{
          this.loadingCtrl.dismiss();
        });
        if(response.toString() != "error"){
          this.router.navigate(['login']);
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
