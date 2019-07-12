import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-rank',
  templateUrl: './rank.page.html',
  styleUrls: ['./rank.page.scss'],
})
export class RankPage implements OnInit {
//<ion-icon name="medal"></ion-icon>
  rankData;
  rankDataOrig;
  constructor(private http: HttpClient) { 
    this.http.get('http://192.168.1.4/thesis/api/ranking.php', { responseType : 'text' }).subscribe((response) => {
      if(response.toString() != "error"){
        this.rankData = JSON.parse(response);
        for(var i =0; i < this.rankData.length; i++){
          if(this.rankData[i].rank==1){
            this.rankData[i].color = "ion-color-gold";
          }else if(this.rankData[i].rank==2){
            this.rankData[i].color = "ion-color-silver";
          }else if(this.rankData[i].rank==3){
            this.rankData[i].color = "ion-color-bronze";
          }
        }
        this.rankDataOrig = this.rankData;
        console.log(this.rankData);
      }
    });
  }

  ngOnInit() {
  }

  searchCancel(){
    this.rankData = this.rankDataOrig;
  }

  search($event){
    this.rankData = this.rankDataOrig;
    let searchKeyword = $event.target.value;
    let tempRankData = [];
    for(var i=0; i < this.rankData.length; i++){
      if(this.rankData[i].name.toLowerCase().includes(searchKeyword) || this.rankData[i].college.toLowerCase().includes(searchKeyword)){
        tempRankData.push(this.rankData[i]);
      }
    }
    this.rankData = tempRankData;
  }

}
