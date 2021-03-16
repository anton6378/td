import { Injectable } from '@angular/core';
import { HttpClient } from "@angular/common/http";
import { environment } from "../../environments/environment";
import { Observable } from "rxjs";
import { Car } from "../models/car";
import { tap } from "rxjs/operators";

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  private readonly apiUrl = environment.backendUrl+'api/';

  constructor(private http: HttpClient) {
  }

  private endpoint(method: string): string {
    return this.apiUrl+method;
  }

  getCars(): Observable<Car[]> {
    return this.http.get<Car[]>(this.endpoint('cars')).pipe(
      tap(result => result.forEach(item => {
        item.picture = environment.backendUrl+'img/'+item.picture;
      }))
    );
  }

}
