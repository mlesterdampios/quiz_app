import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';
import { ObjectParamService } from '../object-param.service';

@Component({
  selector: 'app-lesson',
  templateUrl: './lesson.page.html',
  styleUrls: ['./lesson.page.scss'],
})
export class LessonPage implements OnInit {

  lessonData;
  lessonDataOrig;
  constructor(private objParam: ObjectParamService, private router: Router, private http: HttpClient) {
    this.http.get('http://192.168.1.4/thesis/api/lesson.php', { responseType : 'text' }).subscribe((response) => {
      if(response.toString() != "error"){
        this.lessonData = JSON.parse(response);
        this.lessonDataOrig = this.lessonData;
      }
    });
   }

  lessonDetailedPage(lesson){
    this.objParam.setParam(lesson);
    this.router.navigate(['lesson/lesson-details']);
  }

  searchCancel(){
    this.lessonData = this.lessonDataOrig;
  }

  search($event){
    this.lessonData = this.lessonDataOrig;
    let searchKeyword = $event.target.value;
    let tempLessonData = [];
    for(var i=0; i < this.lessonData.length; i++){
      if(this.lessonData[i].lesson_title.toLowerCase().includes(searchKeyword) || this.lessonData[i].region.toLowerCase().includes(searchKeyword)){
        tempLessonData.push(this.lessonData[i]);
      }
    }
    this.lessonData = tempLessonData;
  }
  
  ngOnInit() {
  }

}
