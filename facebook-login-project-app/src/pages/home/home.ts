import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import {SessionService} from "../../services/session.service";

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {

    constructor(
        public navCtrl: NavController,
        protected _sessionService: SessionService
    ) {

    }

}
