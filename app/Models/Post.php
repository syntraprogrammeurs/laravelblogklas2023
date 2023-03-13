<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['photo_id','user_id','title','body'];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function photo(){
        return $this->belongsTo(Photo::class);
    }
    public function scopeFilter($query,$searchTerm=null,$searchFields=[]){
      //  dd($query);

        //Als een zoekterm is opgegeven
        if($searchTerm){
           //Als specifieke velden zijn aangevinkt
            if($searchFields){
                //Zoek de zoekterm in de opgegeven velden zoeken
                $query->where(function($query) use ($searchFields,$searchTerm){
                    foreach($searchFields as $field){
                        $query->orWhere($field, 'like', '%' . $searchTerm . '%');
                    }
                });
            }else{
                //Zoek de zoekterm in alle velden die gevuld kunnen worden
                $query->where(function($query) use ($searchTerm){
                    $searchFields = (new self())->getFillableFields();
                    foreach($searchFields as $field){
                        $query->orWhere($field, 'like', '%' . $searchTerm . '%');
                    }
                });
            }
            return $query;
        }

    }
    public static function getFillableFields(){
        return (new self())->fillable;
}
}
