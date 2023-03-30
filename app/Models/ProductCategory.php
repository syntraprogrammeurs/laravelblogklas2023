<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable=['name','description'];

    public function products(){
        return $this->belongsToMany(Product::class,'product_productcategory','productcategory_id', 'product_id');
    }
}
