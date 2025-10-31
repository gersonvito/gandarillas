<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OptionProduct extends Pivot
{
    use HasFactory;

    protected $table = 'option_product';

    protected $fillable = ['product_id','option_id','features'];

    protected $casts = [
        'features' => 'array',
    ];
}
