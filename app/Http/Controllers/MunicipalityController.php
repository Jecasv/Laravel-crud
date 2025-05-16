<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use App\Http\Requests\StoreMunicipalityRequest;
use App\Http\Requests\UpdateMunicipalityRequest;

class MunicipalityController extends Controller
{
    public function index()
    {
        return view('municipalities.index', [
            'municipalities' => Municipality::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('municipalities.create');
    }

    public function store(StoreMunicipalityRequest $request)
    {
        Municipality::create($request->validated());
        return redirect()->route('municipalities.index')
            ->with('success', 'Municipio creado exitosamente');
    }

    public function show(Municipality $municipality)
    {
        return view('municipalities.show', compact('municipality'));
    }

    public function edit(Municipality $municipality)
    {
        return view('municipalities.edit', compact('municipality'));
    }

    public function update(UpdateMunicipalityRequest $request, Municipality $municipality)
    {
        $municipality->update($request->validated());
        return redirect()->route('municipalities.index')
            ->with('success', 'Municipio actualizado correctamente');
    }

    public function destroy(Municipality $municipality)
    {
        try {
            $municipality->delete();
            return redirect()->route('municipalities.index')
                ->with('success', 'Municipio eliminado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'No se pudo eliminar el municipio: ' . $e->getMessage());
        }
    }
}
