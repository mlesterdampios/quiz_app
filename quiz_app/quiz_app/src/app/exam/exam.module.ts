import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Routes, RouterModule } from '@angular/router';

import { IonicModule } from '@ionic/angular';

import { ExamPage } from './exam.page';
import { StartPage } from './start/start.page'
import { EndPage } from './end/end.page'

const routes: Routes = [
  {
    path: '',
    component: ExamPage
  },{
    path: 'start',
    component: StartPage
  },{
    path: 'end',
    component: EndPage
  }
];

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RouterModule.forChild(routes)
  ],
  declarations: [ExamPage,StartPage, EndPage]
})
export class ExamPageModule {}
