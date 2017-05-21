import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import {SessionService} from "../../services/session.service";
import {CodesHelper} from "../../helpers/codes.helper";
import {SessionHelper} from "../../helpers/session.helper";
import {MessagesService} from "../../services/messages.service";
import {HomePage} from "../home/home";

declare const FB:any;

@Component({
  selector: 'login-home',
  templateUrl: 'login.html'
})
export class LoginPage {

    constructor(
        public navCtrl: NavController,
        protected _sessionService: SessionService,
        protected _messageService: MessagesService) {
        FB.init({
          appId      : 'APP-ID',
          cookie     : false,  // enable cookies to allow the server to access
          // the session
          xfbml      : true,  // parse social plugins on this page
          version    : 'v2.9' // use graph api version 2.5
        });
    }

    onFacebookLoginClick() {
        FB.login((response:any) => {
            if(response['status'] != undefined){
                let token:string = response['authResponse']['accessToken'];
                FB.api('/me',{access_token: token},{fields: ['email,first_name,last_name,picture']}, (response: any) =>  {
                    this._sessionService.doFacebookLogin(response['id'], response['email'], response['first_name'],
                        response['last_name'], response['picture']['data']['url'])
                        .subscribe(
                            res => {
                                this.handleResponse(res);
                            },
                            error => {
                                this.handleFailure(error);
                            }
                        );
                });
            }
        },{scope: 'email, public_profile'});
    }

    private handleResponse(response){
        let json = response.json();
        let code = json.code;
        let data = json.data;
        if(code == CodesHelper.OK_CODE) {
            SessionHelper.setLocalStorageField('token', data.token.token);
            this._sessionService.setSession(data.user);
            this.navigateToHome();
        }else{
            this.handleFailure(response);
        }
    }
    private handleFailure(error){
        let errorMessage = <any>error;

        if(errorMessage !== null){
            this._messageService.showServerErrorMessage(error);
        }
    }

    private navigateToHome(){
        this.navCtrl.setRoot(HomePage);
    }
}
