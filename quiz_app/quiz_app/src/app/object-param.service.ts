import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ObjectParamService {
  private param;
  constructor() { }

  public setParam(pParam) {
    this.param = pParam;
  }

  getParam() {
    return this.param;
  }

}
