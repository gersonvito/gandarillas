<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

        protected $fillable = [
        'sku',
        'name',
        'description',
        'image_path',
        'price',
        'subategory_id'

    ];

    //relacion uno a muchos inversa 
    public function Subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    //Relacion uno a muchos 
    public function variants(){
        return $this->hasMany(variant::class);
    }

    //Relacion muchos a muchos 
    public function option (){
        return $this->belongsToMany(option::class)
                    ->withPivot('value')
                    ->whithtimestamps();
    }

    
}
