<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'password'=>'required'
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
