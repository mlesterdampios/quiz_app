import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AuthenticationGuard } from './authentication.guard';
import { TestingGuard } from './testing.guard'
const routes: Routes = [
  {
    path: '',
    redirectTo: 'home',
    pathMatch: 'full'
  },
  {
    path: 'home',
    loadChildren: './home/home.module#HomePageModule'
  },
  { 
    path: 'rank',
    loadChildren: './rank/rank.module#RankPageModule'
  },
  {
    path: 'lesson',
    loadChildren: './lesson/lesson.module#LessonPageModule'
  },
  { path: 'register', loadChildren: './register/register.module#RegisterPageModule'},
  { path: 'login', loadChildren: './login/login.module#LoginPageModule'},
  { path: 'history', loadChildren: './history/history.module#HistoryPageModule', canActivate : [AuthenticationGuard]},
  { path: 'exam', loadChildren: './exam/exam.module#ExamPageModule', canActivate : [AuthenticationGuard]},
  { path: 'end', loadChildren: './exam/end/end.module#EndPageModule'},
  { path: 'feedback', loadChildren: './feedback/feedback.module#FeedbackPageModule' },
  { path: 'section', loadChildren: './rank/section/section.module#SectionPageModule' }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
