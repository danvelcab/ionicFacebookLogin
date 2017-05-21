<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 27/03/2017
 * Time: 12:35
 */

namespace app\Services;


use App\Exceptions\PromoformsException;
use App\Http\Requests\Users\ChangePasswordFormRequest;
use App\Http\Requests\Users\RegistrationFormRequest;
use App\Http\Requests\Users\UpdateProfileFormRequest;
use app\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getById($user_id){
        return $this->userRepository->getById($user_id);
    }
}