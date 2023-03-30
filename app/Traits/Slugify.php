<?php
namespace App\Traits;

use Illuminate\Support\Str;

trait Slugify
{
    public function slugify($value)
    {
        return Str::slug($value);
    }
}

