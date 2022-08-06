<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
        if(in_array($this->method(), ['PUT', "PATCH"])){
            return [
                'name' => 'required',
                'email' => 'required|unique:users,email,'.$request->user.'|email',
                'password' => 'nullable|min:6|confirmed',
                'phone_number'=>"required"
            ];
        }else{
            return [
                'name' => 'required',
                'email' => 'required|unique:users,email|email',
                'password' => 'required|min:6|confirmed',
                'phone_number'=>"required"
            ];
        }
    }
}
