<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropDown extends Component
{
    public function render()
    {
        $response = Http::get('https://itunes.apple.com/search/?term='.'sunday bloody sunday' .'&limit=10');
        dd($response->json());
        return view('livewire.search-drop-down');
    }
}
