import { Injectable } from '@angular/core';
import { HttpClient } from "@angular/common/http";
import { environment } from "../../environments/environment";
import { Observable } from "rxjs";
import { Car } from "../models/car";

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  private readonly apiUrl = environment.apiUrl;

  constructor(private http: HttpClient) {
  }

  private endpoint(method: string): string {
    return this.apiUrl+method;
  }

  getCars() {
    return this.http.get<Observable<Car[]>>(this.endpoint('cars'));
  }

}
