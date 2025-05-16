<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Municipality;
use App\Http\Requests\StoreDistrictRequest;
use App\Http\Requests\UpdateDistrictRequest;

class DistrictController extends Controller
{
    public function index()
    {
        return view('districts.index', [
            'districts' => District::with('municipality')->latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('districts.create', [
            'municipalities' => Municipality::all()
        ]);
    }

    public function store(StoreDistrictRequest $request)
    {
        District::create($request->validated());
        return redirect()->route('districts.index')
            ->with('success', 'Distrito creado exitosamente');
    }

    public function show(District $district)
    {
        return view('districts.show', [
            'district' => $district->load('municipality')
        ]);
    }

    public function edit(District $district)
    {
        return view('districts.edit', [
            'district' => $district,
            'municipalities' => Municipality::all()
        ]);
    }

    public function update(UpdateDistrictRequest $request, District $district)
    {
        $district->update($request->validated());
        return redirect()->route('districts.index')
            ->with('success', 'Distrito actualizado correctamente');
    }

    public function destroy(District $district)
    {
        try {
            $district->delete();
            return redirect()->route('districts.index')
                ->with('success', 'Distrito eliminado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'No se pudo eliminar el distrito: ' . $e->getMessage());
        }
    }
}
