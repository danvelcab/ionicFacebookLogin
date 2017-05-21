
import {CodesHelper} from "../helpers/codes.helper";
import {AlertController} from "ionic-angular";
import {Injectable} from "@angular/core";

@Injectable()
export class MessagesService{

    constructor(public alertCtrl: AlertController) {
    }

    public showServerErrorMessage(message){
        if(message.status == CodesHelper.FAILED_VALIDATOR_CODE){
            let messages = "";
            let json = JSON.parse(message._body);
            for(let i=0; i<json.message.length; i++){
                messages = messages + json.message[i] + " ";
            }
            this.showErrorMessage(messages);
        }else{
            this.showErrorMessage(CodesHelper.MESSAGES[CodesHelper.SERVER_ERROR_CODE]);
        }
    }
    public showErrorMessage(message){
        let alert = this.alertCtrl.create({
            title: 'Error',
            subTitle: message,
            buttons: ['Aceptar']
        });
        alert.present();
    }
    public showSuccessMessage(message){
        let alert = this.alertCtrl.create({
            title: 'Success',
            subTitle: message,
            buttons: ['Aceptar']
        });
        alert.present();
    }
}
