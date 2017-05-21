import {ConfigHelper} from "./config.helper";

export class SessionHelper{

    public static getLocalStorageField(field: string){
        return localStorage.getItem(ConfigHelper.PROJECT_NAME + "-" +field);
    }
    public static setLocalStorageField(field: string, value: any){
        localStorage.setItem(ConfigHelper.PROJECT_NAME + "-" +field, value);
    }
    public static clearLocalStorageField(field: string){
        localStorage.removeItem(ConfigHelper.PROJECT_NAME + "-" +field);
    }
}
