<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function create(){
        return view('contactformulier');//contactformulier
    }
    public function store(Request $request){
        //validation rules
        request()->validate([
           'name' => ['required', 'between:2,255'],
           'email'=>['required','email'],
           'message' => ['required', 'regex:/^[^<>]*$/'],
        ]);

        //data versturen
        $data = $request->all();//wordt verstuurd naar markdown die de layout bevat voor de email
        //die we moeten ontvangen
        Mail::to(request('email'))->send(new Contact($data));
        return back()->with('status', 'Form received, thank you!');
    }
}
