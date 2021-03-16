import { Component, OnInit } from '@angular/core';
import { ApiService } from "./services/api.service";
import { Car } from "./models/car";
import { Observable } from "rxjs";
import { MatDialog } from "@angular/material/dialog";
import { ApplicationComponent } from "./components/application/application.component";

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit {

  cars$: Observable<Car[]>;

  constructor(
    private api: ApiService,
    private dialog: MatDialog
  ) {
  }

  ngOnInit(): void {
    this.cars$ = this.api.getCars();
  }

  apply(car: Car) {
    this.dialog.open(ApplicationComponent, {data: car, width: 'calc(100vw - 60px)', maxWidth: '700px'});
  }
}
