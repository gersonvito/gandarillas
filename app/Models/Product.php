<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

        protected $fillable = [
        'sku',
        'name',
        'description',
        'image_path',
        'price',
        'subcategory_id'

    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn() => Storage::url($this->image_path),
        );
    }

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
