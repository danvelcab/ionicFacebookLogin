<?php

namespace App\Http\Requests;

use App\Providers\CodesServiceProvider;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class RegistrationByFacebookFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "facebook_id"            =>  "required|string:users,facebook|max:200",
            "email"         =>  ["required", Rule::unique('users')->ignore($this->request->get('facebook_id'), 'fb_id'),"email","max:100"],
            "name"          =>	"required|max:50",
            "last_name"     =>  "required|max:50",
            "image_url"     =>  "required|string"
        ];
    }


    protected function formatErrors(Validator $validator)
    {
        return array('error' => true, 'code' => CodesServiceProvider::FAILED_VALIDATOR_CODE,
            'message' => $validator->errors()->all());
    }
}
