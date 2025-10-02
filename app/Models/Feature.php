<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'description',
        'option_id',

    ];

    //Relacion uno a muchos inversa
    public function option(){
        return $this->belongsTo(option::class);
    }

    // relacion muchoes a muchos 
    public function variants(){
        return $this->belongsToMany(Variant::class)
                    ->withTimestamps();
    }

}
