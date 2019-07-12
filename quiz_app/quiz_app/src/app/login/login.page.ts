import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';
import { LoadingController, AlertController  } from '@ionic/angular';
import { AuthenticationService } from '../authentication.service';
@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {
  data;
  passwordType: string = 'password';
  passwordIcon: string = 'eye-off';
  constructor(private auth: AuthenticationService, public alertController: AlertController, public loadingCtrl: LoadingController, private router: Router, private http: HttpClient) { 
    this.data = {
      email: "",
      password: ""
    }
  }

  ngOnInit() {
  }

  async alertShow(){
    const alert = await this.alertController.create({
      header: 'Error',
      subHeader: 'User or Password Invalid',
      message: 'Please check your credentials.',
      buttons: ['OK']
    });
    await alert.present();
  }

  async loadingFunction(loadmsg) {
    const loader = await this.loadingCtrl.create({
      message: loadmsg
    })
    return await loader.present();
  }

  hideShowPassword() {
    this.passwordType = this.passwordType === 'text' ? 'password' : 'text';
    this.passwordIcon = this.passwordIcon === 'eye-off' ? 'eye' : 'eye-off';
  }

  login(){
    let loading = this.loadingFunction("Please wait...");

    const formData = new FormData();
    formData.append('data', JSON.stringify(this.data));
    
    this.http.post('http://192.168.1.4/thesis/api/login.php', formData, {responseType: 'text'}).subscribe((response) => {
      loading.then(()=>{
        this.loadingCtrl.dismiss();
      });
      if(response.toString() != "error"){
        console.log(JSON.parse(response));
        this.auth.setLoggedIn(JSON.parse(response));
        this.router.navigate(['home']);
      }else{
        this.alertShow();
      }
    });
  }

  signup(){
    this.router.navigate(['register']);
  }

}
