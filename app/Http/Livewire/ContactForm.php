<?php

namespace App\Http\Livewire;

use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $message;

    public function submitForm(){
        $data = [
          'name'=>$this->name,
          'email'=>$this->email,
          'message'=> $this->message
        ];
        Mail::to($this->email)->send(new Contact($data));

        $this->resetForm();
        session()->flash('status', 'Message received!');
    }
    private function resetForm(){
        $this->name = '';
        $this->email='';
        $this->message ='';
    }
    public function render()
    {
        return view('livewire.contact-form');
    }
}
