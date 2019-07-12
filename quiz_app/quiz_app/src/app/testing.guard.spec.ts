import { TestBed, async, inject } from '@angular/core/testing';

import { TestingGuard } from './testing.guard';

describe('TestingGuard', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [TestingGuard]
    });
  });

  it('should ...', inject([TestingGuard], (guard: TestingGuard) => {
    expect(guard).toBeTruthy();
  }));
});
