<?php

use App\Models\Product;
use App\Models\Variant;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamilyController;
use Illuminate\Queue\Console\RetryCommand;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');

Route::get('families/{family}', [FamilyController::class, 'show'])->name('families.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



 Route::get('prueba', function () {

/*     $array1 = ['a', 'b', 'c'];
    $array2 = ['a', 'b', 'c'];
    $array3 = ['a', 'b', 'c'];

    $arrays = [$array1, $array2, $array3];

    $combinaciones = generarCombinaciones($arrays);

    return $combinaciones; */

    //$features = Product::find(11)->options->pluck('pivot.features');

    //$combinaciones = generarCombinaciones($features);

    //return $combinaciones;




    $product = Product::find(3);

    $features = $product->options->pluck('pivot.features');


    //dd($features);

    $combinaciones = generarCombinaciones($features);

    $product->variants()->delete();

    foreach ($combinaciones as $combinacion) {

        $variant = Variant::create([
            'product_id' => $product->id,

        ]);

        $variant->features()->attach($combinacion);

    }

    return "Variantes creadas correctamente.";

});


function generarCombinaciones($arrays, $indice = 0, $combinacion = [])
{

    if ($indice == count($arrays)) {
        //echo implode('', $combinacion) . "\n";
        return [$combinacion];
    }

    $resultado = [];

    foreach ($arrays[$indice] as $item) {
        // $item ya es un ID entero si normalizaste antes
        $combinacionTemporal = $combinacion;
        $combinacionTemporal[] = (int) $item;

        // ❌ antes: $resultado[] = array_merge($resultado, generarCombinaciones(...));
        // ✅ ahora:
        $resultado = array_merge(
            $resultado,
            generarCombinaciones($arrays, $indice + 1, $combinacionTemporal)
        );
    }

    return $resultado;

}

