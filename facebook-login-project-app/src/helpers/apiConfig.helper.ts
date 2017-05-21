
export class ApiConfigHelper{

    public static PROJECT_NAME = 'project';

    public static HOST = "http://localhost/facebook-login-project/facebook-login-project-ws/public/api/";

    public static getFacebookLoginUrl(){
        return ApiConfigHelper.HOST + "loginByFacebook";
    }
    public static getUserDetailURL(){
        return ApiConfigHelper.HOST + "user/"
    }
}
