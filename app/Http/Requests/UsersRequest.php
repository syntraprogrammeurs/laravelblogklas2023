<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class UsersRequest extends FormRequest
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
        return [
            //
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users|max:255',
            'roles'=>'required',
            'is_active'=>'required',
            'password'=>'required',
            'photo_id'=>['required',File::types(['png', 'jpg','webp','jpeg'])
                ->min(1)
                ->max(2 * 1024),]
        ];
    }
    public function messages(){
        return [
            //
            'name.required'=>'This Name is required',
            'email.required'=> 'This email is required',
            'password.required'=> 'This password is required'
        ];
    }
}
