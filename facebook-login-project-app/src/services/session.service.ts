import {Injectable} from "@angular/core";
import { Http, Response, Headers, RequestOptions } from '@angular/http';
import {Observable} from "rxjs/Observable";
import {ApiConfigHelper} from "../helpers/apiConfig.helper";
import {SessionHelper} from "../helpers/session.helper";
import {User} from "../models/user";
import {Subject} from "rxjs/Subject";

/**
 * Created by Daniel on 14/05/2017.
 */

@Injectable()
export class SessionService {

    private user: User;


    // Observable string sources
    private emitLogin = new Subject<any>();

    // Observable string streams
    loginEmitted$ = this.emitLogin.asObservable();

    constructor(
        public _http:Http,
        ) {
    }

    public getSessionData(): boolean{
        let email = SessionHelper.getLocalStorageField('email');
        let token = SessionHelper.getLocalStorageField('token');

        return email != null && token != null;
    }

    public initializeSession(): Observable<Response>{
        let id = SessionHelper.getLocalStorageField('id');
        let token = SessionHelper.getLocalStorageField('token');

        let headers = new Headers({
          'X-Requested-With': 'XMLHttpRequest',
          'Authorization': "Bearer " + token
        });

        let options = new RequestOptions({ headers: headers });

        return this._http.get(ApiConfigHelper.getUserDetailURL() + id, options);
    }

    public getLoggedUser(): User{
        return this.user;
    }

    public setSession(data: any): void{
        SessionHelper.setLocalStorageField('id', data['id']);
        SessionHelper.setLocalStorageField('email', data['email']);

        this.user = new User;
        this.user.id = data['id'];
        this.user.email = data['email'];
        this.user.name = data['name'];
        this.user.lastName = data['last_Name'];
        this.user.fbId = data['fb_Id'];
        this.user.imageURL = data['profile_image'];

        this.emitLogin.next(this.user);
    }

    doFacebookLogin(facebookId: string, email: string, name: string, lastName: string, profileImage: string = null): Observable<any> {

        var parameters = {
            'facebook_id': facebookId,
            'email': email,
            'name': name,
            'last_name': lastName,
            'image_url': profileImage
        };

        let headers = new Headers({
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        });
        return this._http.post(ApiConfigHelper.getFacebookLoginUrl(),
            parameters,
            {headers: headers}
        )
    }

    logout(){
        SessionHelper.clearLocalStorageField('token');
        SessionHelper.clearLocalStorageField('email');
        SessionHelper.clearLocalStorageField('id');
    }

}
