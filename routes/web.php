<?php

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\DistrictController;


// Ruta principal que redirige al listado de municipios
Route::redirect('/', '/municipalities');

// Rutas para Municipios
Route::resource('municipalities', MunicipalityController::class)
    ->parameters(['municipalities' => 'municipality'])
    ->names([
        'index' => 'municipalities.index',
        'create' => 'municipalities.create',
        'store' => 'municipalities.store',
        'show' => 'municipalities.show',
        'edit' => 'municipalities.edit',
        'update' => 'municipalities.update',
        'destroy' => 'municipalities.destroy'
    ]);

// Rutas para Distritos
Route::resource('districts', DistrictController::class)
    ->parameters(['districts' => 'district'])
    ->names([
        'index' => 'districts.index',
        'create' => 'districts.create',
        'store' => 'districts.store',
        'show' => 'districts.show',
        'edit' => 'districts.edit',
        'update' => 'districts.update',
        'destroy' => 'districts.destroy'
    ]);