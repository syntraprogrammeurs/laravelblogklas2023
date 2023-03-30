<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    //
    public function create(){
        return view('contactformulier');
    }
    public function store(Request $request){
        request()->validate([
            'name'=> ['required','between:2,255'],
            'email'=>['required','email'],
            'message' => ['required', 'regex:/^[^<>]*$/'],
        ],[
            'name.required'=>'Name is required',
            'email.required'=>'Email is required',
            'name.between'=>'Name has to be minimum 2 characters long'
        ]);

        $data = $request->all();
        Mail::to(request('email'))->send(new Contact($data));
        return back()->with('status', 'Form received, thank you!');
    }
}
