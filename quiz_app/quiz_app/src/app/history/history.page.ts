import { Component, OnInit } from '@angular/core';
import { AuthenticationService } from '.././authentication.service';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-history',
  templateUrl: './history.page.html',
  styleUrls: ['./history.page.scss'],
})
export class HistoryPage implements OnInit {
  history;
  historyOrig;
  constructor(private auth: AuthenticationService, private http: HttpClient) { 
    this.http.get('http://192.168.1.4/thesis/api/history.php?email=' + auth.getUser().email, { responseType : 'text' }).subscribe((response) => {
      if(response.toString() != "error"){
        this.history = JSON.parse(response);
        this.historyOrig = this.history;
      }
    });
  }

  ngOnInit() {
  }
  
  searchCancel(){
    this.history = this.historyOrig;
  }

  search($event){
    this.history = this.historyOrig;
    let searchKeyword = $event.target.value;
    let temphistory = [];
    for(var i=0; i < this.history.length; i++){
      if(this.history[i].title.toLowerCase().includes(searchKeyword)){
        temphistory.push(this.history[i]);
      }
    }
    this.history = temphistory;
  }
}
