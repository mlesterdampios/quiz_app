import { Component, OnInit } from '@angular/core';
import { ModalController } from '@ionic/angular';
import { ObjectParamService } from '../../object-param.service';

@Component({
  selector: 'app-end',
  templateUrl: './end.page.html',
  styleUrls: ['./end.page.scss'],
})
export class EndPage implements OnInit {
  question;
  constructor(private objParam: ObjectParamService, public modalController: ModalController) { 
    this.question = this.objParam.getParam();
  }

  ngOnInit() {
  }

  close(){
    this.modalController.dismiss();
  }
}
