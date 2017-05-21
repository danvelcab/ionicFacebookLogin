<?php 

namespace App\Http\Controllers;

use App\Exceptions\FacebookLoginProjectException;
use App\Providers\CodesServiceProvider;
use app\Services\UserService;

class UserController extends Controller
{

    protected $userServices;

    public function __construct(UserService $userServices)
    {
        $this->userServices = $userServices;
    }

    public function details($user_id){
        try{
            $user = $this->userServices->getById($user_id);
            return array(
                'error' => false,
                'code' => CodesServiceProvider::OK_CODE,
                'data' => array('user' => $user)
            );
        }catch (FacebookLoginProjectException $exception){
            return array(
                'error' => true,
                'code' => CodesServiceProvider::SERVER_ERROR_CODE,
                'message' => $exception->getMessage()
            );
        }
    }
}

?>