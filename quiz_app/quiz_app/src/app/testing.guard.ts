import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, UrlTree } from '@angular/router';
import { Observable } from 'rxjs';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class TestingGuard implements CanActivate {

  constructor(private router : Router) {}

  canActivate(): boolean {
    var x = new Date('2019-04-07');
    var y = new Date();
    console.log(x + " > " + y + " ? " + (x>y));
    if (!(x > y)) {
      this.router.navigate(["home"]);
    }
    return x > y;
  }
}
