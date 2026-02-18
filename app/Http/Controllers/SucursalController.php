<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;

class SucursalController extends Controller
{
    public function index()
    {
        $sucursales = Sucursal::latest()->paginate(10);
        return view('sucursal.index', compact('sucursales'));
    }

    public function create()
    {
        return view('sucursal.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'ciudad' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:100',
            'codigo_postal' => 'nullable|string|max:20',
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string|max:50',
            'email' => 'nullable|email',
            'horario_apertura' => 'nullable|date_format:H:i',
            'horario_cierre' => 'nullable|date_format:H:i',
            'gerente' => 'nullable|string|max:255',
        ]);

        Sucursal::create($data);

        return redirect()->route('sucursal.index')->with('success', 'Sucursal creada correctamente.');
    }

    public function show($id)
    {
        $sucursal = Sucursal::findOrFail($id);
        return view('sucursal.show', compact('sucursal'));
    }

    public function edit($id)
    {
        $sucursal = Sucursal::findOrFail($id);
        return view('sucursal.edit', compact('sucursal'));
    }

    public function update(Request $request, $id)
    {
        $sucursal = Sucursal::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'ciudad' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:100',
            'codigo_postal' => 'nullable|string|max:20',
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string|max:50',
            'email' => 'nullable|email',
            'horario_apertura' => 'nullable|date_format:H:i',
            'horario_cierre' => 'nullable|date_format:H:i',
            'gerente' => 'nullable|string|max:255',
        ]);

        $sucursal->update($data);

        return redirect()->route('sucursal.index')->with('success', 'Sucursal actualizada correctamente.');
    }

    public function destroy($id)
    {
        $sucursal = Sucursal::findOrFail($id);
        $sucursal->delete();

        return redirect()->route('sucursal.index')->with('success', 'Sucursal eliminada correctamente.');
    }
}
