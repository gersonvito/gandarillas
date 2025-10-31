<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'image_path',
        'product_id'

    ];

    //Relacion uno a muchos incversa
    public function product(){
        return $this->belongsTo(Product::class);
    }

    /*public function features()
    {
        // Por convención, pivot = feature_variant (orden alfabético)
        return $this->belongsToMany(Feature::class);
    }*/

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'feature_variant');
    }
}
