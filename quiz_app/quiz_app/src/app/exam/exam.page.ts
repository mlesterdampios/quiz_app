import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { ObjectParamService } from '../object-param.service';
import { Router } from '@angular/router';
import { AuthenticationService } from '.././authentication.service';

@Component({
  selector: 'app-exam',
  templateUrl: './exam.page.html',
  styleUrls: ['./exam.page.scss'],
})
export class ExamPage implements OnInit {

  exam;
  examOrig;
  constructor(private auth: AuthenticationService,private router: Router, private objParam: ObjectParamService, private http: HttpClient) { 
    this.http.get('http://192.168.1.4/thesis/api/quiz.php?email=' + (this.auth.getUser() ? this.auth.getUser().email : ''), { responseType : 'text' }).subscribe((response) => {
      if(response.toString() != "error"){
        this.exam = JSON.parse(response);
        this.examOrig = this.exam;
      }
    });
  }

  ngOnInit() {
  }

  examDetailedPage(e){
    this.objParam.setParam(e);
    this.router.navigate(['exam/start']);
  }
  searchCancel(){
    this.exam = this.examOrig;
  }

  search($event){
    this.exam = this.examOrig;
    let searchKeyword = $event.target.value;
    let tempexam = [];
    for(var i=0; i < this.exam.length; i++){
      if(this.exam[i].title.toLowerCase().includes(searchKeyword)){
        tempexam.push(this.exam[i]);
      }
    }
    this.exam = tempexam;
  }
}
