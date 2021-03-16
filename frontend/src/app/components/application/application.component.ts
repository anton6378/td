import { Component, Inject, OnInit } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from "@angular/material/dialog";
import { Car } from "../../models/car";
import { FormBuilder, FormGroup, Validators } from "@angular/forms";
import { ApiService } from "../../services/api.service";
import { Subscription } from "rxjs";

@Component({
  selector: 'app-application',
  templateUrl: './application.component.html',
  styleUrls: ['./application.component.scss']
})
export class ApplicationComponent implements OnInit {

  form: FormGroup;
  sub: Subscription;

  constructor(
    public dialogRef: MatDialogRef<ApplicationComponent>,
    @Inject(MAT_DIALOG_DATA) public car: Car,
    private fb: FormBuilder,
    private api: ApiService
  ) { }

  ngOnInit(): void {
    this.form = this.fb.group({
      car_id: [this.car.id],
      name: ['', [Validators.required]],
      phone: ['', [Validators.required, Validators.pattern(/^(\+?7|8)\s*[(-]?\s*\d{3}\s*[)-]?\s*\d{3}\s*-?\s*\d{2}\s*-?\s*\d{2}$/)]],
      email: ['', [Validators.required, Validators.email]],
      accept: [false, [Validators.requiredTrue]]
    });
  }

  get name() {
    return this.form.get('name');
  }

  get email() {
    return this.form.get('email');
  }

  get phone() {
    return this.form.get('phone');
  }

  submit() {
    this.sub = this.api.postApplication(this.form.value).subscribe(result => {
      this.dialogRef.close(true);
    });
  }

}
