import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Routes, RouterModule } from '@angular/router';

import { IonicModule } from '@ionic/angular';
import { LessonPage } from './lesson.page';
import { LessonDetailsPage } from './lesson-details/lesson-details.page';

const routes: Routes = [
  {
    path: '',
    component: LessonPage
  },
  {
    path: 'lesson-details',
    component: LessonDetailsPage
  }
];

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RouterModule.forChild(routes)
  ],
  declarations: [LessonPage,LessonDetailsPage]
})
export class LessonPageModule {}
