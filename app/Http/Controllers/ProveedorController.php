<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::latest()->paginate(10);
        return view('proveedor.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedor.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'nullable|email|unique:proveedores,email',
            'telefono' => 'nullable|string|max:50',
            'direccion' => 'nullable|string',
            'empresa' => 'nullable|string|max:255',
        ]);

        Proveedor::create($data);

        return redirect()->route('proveedor.index')->with('success', 'Proveedor creado correctamente.');
    }

    public function show($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedor.show', compact('proveedor'));
    }

    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedor.edit', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'nullable|email|unique:proveedores,email,' . $proveedor->id,
            'telefono' => 'nullable|string|max:50',
            'direccion' => 'nullable|string',
            'empresa' => 'nullable|string|max:255',
        ]);

        $proveedor->update($data);

        return redirect()->route('proveedor.index')->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()->route('proveedor.index')->with('success', 'Proveedor eliminado correctamente.');
    }
}
