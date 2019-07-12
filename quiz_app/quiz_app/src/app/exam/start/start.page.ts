import { Component, OnInit } from '@angular/core';
import { AuthenticationService } from '../.././authentication.service';
import { HttpClient } from '@angular/common/http';
import { ObjectParamService } from '../../object-param.service';
import { LoadingController, AlertController } from '@ionic/angular';
import { Router } from '@angular/router';
import { ModalController } from '@ionic/angular';
import { EndPage } from '../end/end.page';

@Component({
  selector: 'app-start',
  templateUrl: './start.page.html',
  styleUrls: ['./start.page.scss'],
})
export class StartPage implements OnInit {
  quiz;
  question;
  interval;
  timeLeft;
  started;
  allowFinishChecking = true;
  constructor(public modalController: ModalController, private router: Router, public loadingCtrl: LoadingController, public alertController: AlertController,private objParam: ObjectParamService,private auth: AuthenticationService, private http: HttpClient) { 
    this.quiz = this.objParam.getParam();
    this.http.get('http://192.168.1.4/thesis/api/question.php?eid=' + this.quiz.eid, { responseType : 'text' }).subscribe((response) => {
      if(response.toString() != "error"){
        this.question = JSON.parse(response);
        console.log("unshuffled questions");
        console.log(this.question);
        //shuffle questions
        this.shuffle(this.question);
        console.log("shuffled questions");
        console.log(this.question);
        //shuffle shuffle choices
        for(var i=0; i < this.question.length; i++){
          this.question[i].user_ans = "";
          this.shuffle(this.question[i].options);
        }
        console.log("shuffled choices");
        console.log(this.question);
        //start timer
        this.http.get('http://192.168.1.4/thesis/api/quiz_validate.php?eid=' + this.quiz.eid+"&email=" + (this.auth.getUser() ? this.auth.getUser().email : ''), { responseType : 'text' }).subscribe((response) => {
          if(response.toString() != "error"){
            this.alertShow("Not allowed","You already taken this exam");
            this.router.navigate(['exam']);
          }else{
            this.timeLeft = this.quiz.time * 60;
            this.startTimer();
            this.started = true;
          }
        });
      }
    });

  }

  ngOnInit(){

  }

  async alertShow(pHeader, pMessage){
    const alert = await this.alertController.create({
      header: pHeader,
      message : pMessage,
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

  startTimer() {
    this.interval = setInterval(() => {
      console.log(this.timeLeft);
        if(this.timeLeft > 0) {
          this.timeLeft --;
        } else {
          //this.alertShow("Your time has ended!");
          this.allowFinishChecking = false;
          this.submit();
        }
    },1000);
  }

  async presentModal() {
    const modal = await this.modalController.create({
      component: EndPage
    });
    return await modal.present();
  }

  submit(){
    if(this.allowFinishChecking){
      let isFinished = true;
      for(var i=0; i < this.question.length; i++){
        if(!this.question[i].user_ans){
          isFinished = false;
        }
      }
    
      if (!isFinished)
        return;
    }

    clearInterval(this.interval);
    var data = {
      email : this.auth.getUser() ? this.auth.getUser().email : '',
      eid : this.quiz.eid,
      score:0,
      level:0,
      sahi:0,
      wrong:0
    };

    var loading = this.loadingFunction("Checking and calculating results...");
    console.log(this.question);
    for(var i=0; i < this.question.length; i++){
      if(this.question[i].user_ans){
        data.level++;
      }
      console.log(this.question[i].user_ans +" ? "+ this.question[i].ansid);
      if(this.question[i].user_ans === this.question[i].ansid){
        data.sahi++;
      }else{
        data.wrong++;
      }
    }
    var correctAns = data.sahi, wrongAns = data.wrong;
    data.sahi = data.sahi * this.quiz.sahi;
    data.wrong = data.wrong * this.quiz.wrong;
    data.score = data.sahi - data.wrong;
    const formData = new FormData();

    formData.append('data', JSON.stringify(data));
    console.log(data);

    this.http.post('http://192.168.1.4/thesis/api/score.php', formData, {responseType: 'text'}).subscribe((response) => {
      console.log(response);
      loading.then(()=>{
        this.loadingCtrl.dismiss();
      });
      if(response.toString() != "error"){
        this.alertShow("Results","Here are the results. <br>Correct: "+correctAns+" X "+this.quiz.sahi+"pts"+", <br>Wrong: "+wrongAns+" X "+this.quiz.wrong+"pts"+", <br>Total Score: "+data.score);
        this.objParam.setParam(this.question);
        this.presentModal();
        this.router.navigate(['exam']);
      }else{
        this.alertShow("Something went wrong","Please try again");
        this.router.navigate(['exam']);
      }
    });

  }
  
  shuffle(array) {

    var currentIndex = array.length;
    var temporaryValue, randomIndex;
  
    // While there remain elements to shuffle...
    while (0 !== currentIndex) {
      // Pick a remaining element...
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex -= 1;
  
      // And swap it with the current element.
      temporaryValue = array[currentIndex];
      array[currentIndex] = array[randomIndex];
      array[randomIndex] = temporaryValue;
    }
  
    return array;
  
  };
}
