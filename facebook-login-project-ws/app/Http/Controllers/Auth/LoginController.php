<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationByFacebookFormRequest;
use App\Providers\CodesServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Lang;
use Psy\Exception\ErrorException;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginByFacebook(RegistrationByFacebookFormRequest $request){
        $facebook_id = $request->get('facebook_id');
        $email = $request->get('email');
        $name = $request->get('name');
        $last_name = $request->get('last_name');
        $image_url = $request->get('image_url');

        $user = User::firstOrCreate(
            ['fb_id' => $facebook_id, 'email' => $email]
        );
        $updated = false;
        if($user->name != $name){
            $user->name = $name;
            $updated = true;
        }
        if($user->last_name != $last_name){
            $user->last_name = $last_name;
            $updated = true;
        }
        if($user->profile_image != $image_url){
            $user->profile_image = $image_url;
            $updated = true;
        }
        if($updated){
            $user->save();
        }

        try {
            if (!$token = JWTAuth::fromUser($user)) {
                return array(
                    'error' => true,
                    'code' => CodesServiceProvider::INVALID_TOKEN,
                    'message' => Lang::get('httpResponses')[CodesServiceProvider::INVALID_TOKEN]
                );
            }

            return array(
                'error' => false,
                'code' => CodesServiceProvider::OK_CODE,
                'data' => array(
                    'user' => $user,
                    'token' => compact('token')['token']
                )
            );

        } catch (JWTException $e) {
            return array(
                'error' => true,
                'code' => CodesServiceProvider::COULD_NOT_CREATE_TOKEN,
                'message' => Lang::get('httpResponses')[CodesServiceProvider::COULD_NOT_CREATE_TOKEN]
            );
        } catch (ErrorException $e){
            return array(
                'error' => true,
                'code' => CodesServiceProvider::SERVER_ERROR_CODE,
                'message' => $e->getMessage()
            );
        }
    }
}
