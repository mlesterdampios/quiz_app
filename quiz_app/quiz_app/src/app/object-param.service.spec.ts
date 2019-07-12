import { TestBed } from '@angular/core/testing';

import { ObjectParamService } from './object-param.service';

describe('ObjectParamService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ObjectParamService = TestBed.get(ObjectParamService);
    expect(service).toBeTruthy();
  });
});
