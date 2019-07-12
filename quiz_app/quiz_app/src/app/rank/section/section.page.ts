import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
@Component({
  selector: 'app-section',
  templateUrl: './section.page.html',
  styleUrls: ['./section.page.scss'],
})
export class SectionPage implements OnInit {

//<ion-icon name="medal"></ion-icon>
rankData;
sections = [];
constructor(private http: HttpClient) { 
  this.http.get('http://192.168.1.4/thesis/api/ranking.php', { responseType : 'text' }).subscribe((response) => {
    if(response.toString() != "error"){
      let tempData = JSON.parse(response);
      console.log(tempData);
      for(var i=0; i < tempData.length; i++){
        if(!this.sections.includes(tempData[i].college)){
          this.sections.push(tempData[i].college);
        }
      }
      let newArray = {};
      console.log(tempData.sort(this.compareCollege));
      for(var i=0; i < this.sections.length; i++){
        newArray[this.sections[i]] = [];
        for(var j=0; j < tempData.length; j++){
          if(tempData[j].college == this.sections[i]){
            if(!newArray[this.sections[i]].includes(tempData[j])){
              newArray[this.sections[i]].push(tempData[j]);
            }
          }
        }
        for(var k = 0; k < newArray[this.sections[i]].length; k++){
          newArray[this.sections[i]][k].rank = k+1;
          if(k+1==1){
            newArray[this.sections[i]][k].color = "ion-color-gold";
          }else if(k+1==2){
            newArray[this.sections[i]][k].color = "ion-color-silver";
          }else if(k+1==3){
            newArray[this.sections[i]][k].color = "ion-color-bronze";
          }
        }
      }
      this.rankData = newArray;
      console.log(newArray);
    }
  });
}

ngOnInit() {
}

compareScore(a, b) {
  const scoreA = a.score;
  const scoreB = b.score;
  
  let comparison = 0;
  if (scoreA > scoreB) {
    comparison = 1;
  } else if (scoreA < scoreB) {
    comparison = -1;
  }
  return comparison * -1;
}

compareCollege(a, b) {
  const collegeA = a.college.toUpperCase();
  const collegeB = b.college.toUpperCase();
  
  let comparison = 0;
  if (collegeA > collegeB) {
    comparison = 1;
  } else if (collegeA < collegeB) {
    comparison = -1;
  }
  return comparison;
}

}
