import { Component, OnInit } from '@angular/core';
import { ApiService } from "./services/api.service";
import { Car } from "./models/car";
import { Observable } from "rxjs";

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit {

  cars$: Observable<Car[]>;

  constructor(private api: ApiService) {
  }

  ngOnInit(): void {
    this.cars$ = this.api.getCars();
  }

  apply(car: Car) {

  }
}
