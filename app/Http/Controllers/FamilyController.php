<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Option;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function show(Family $family)
    {

        $options = Option::whereHas('products.subcategory.category', function($query) use ($family){
            $query->where('family_id', $family->id);
        })->witch('features')
        ->get();

        return $options;

        return view('families.show', compact('family'));
    }
}
