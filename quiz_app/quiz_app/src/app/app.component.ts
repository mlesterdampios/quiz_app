import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { Platform } from '@ionic/angular';
import { SplashScreen } from '@ionic-native/splash-screen/ngx';
import { StatusBar } from '@ionic-native/status-bar/ngx';
import { AuthenticationService } from './authentication.service';

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html'
})
export class AppComponent {
  public appPages = [
    {
      title: 'Home',
      url: '/home',
      icon: 'home'
    },
    {
      title: 'Overall Ranking',
      url: '/rank',
      icon: 'medal'
    },
    {
      title: 'Ranking By Section',
      url: '/section',
      icon: 'medal'
    },
    {
      title: 'Lesson',
      url: '/lesson',
      icon: 'book'
    },
    {
      title: 'Feedback',
      url: '/feedback',
      icon: 'rocket'
    }
  ];
  public notAuthenticatedPages = [
    {
      title: 'Register',
      url: '/register',
      icon: 'person-add'
    },
    {
      title: 'Login',
      url: '/login',
      icon: 'log-in'
    }
  ];
  public authenticatedPages = [
      {
        title: 'History',
        url: '/history',
        icon: 'refresh'
      },
      {
        title: 'Exam',
        url: '/exam',
        icon: 'create'
      }
  ];

  constructor(
    private platform: Platform,
    private splashScreen: SplashScreen,
    private statusBar: StatusBar,
    private auth: AuthenticationService,
    private router: Router

  ) {
    this.initializeApp();
  }

  initializeApp() {
    this.platform.ready().then(() => {
      this.statusBar.styleDefault();
      this.splashScreen.hide();
    });
  }

  logout(){
    this.auth.logout();
    this.router.navigate(['home']);
  }
}
