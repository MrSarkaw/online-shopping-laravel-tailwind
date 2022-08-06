<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
    public function rules()
    {
        if(in_array($this->method(), ['PUT', "PATCH"])){
            return [
                'title' =>'required',
                'price' =>'required|numeric',
                'descritpion' =>'required',
                'color' =>'required',
                'size' =>'required',
                'file' =>'nullable|mimes:png,jpg,jpeg'
            ];
        }else{
            return [
                'title' =>'required',
                'price' =>'required|numeric',
                'descritpion' =>'required',
                'color' =>'required',
                'size' =>'required',
                'file' =>'required|mimes:png,jpg,jpeg'
            ];
        }
    }
}
