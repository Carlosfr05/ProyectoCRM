<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of productos
     */
    public function index()
    {
        $productos = Producto::latest()->paginate(10);
        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new producto
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created producto in storage
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0.01',
            'cantidad' => 'required|integer|min:0',
            'sku' => 'required|string|unique:productos,sku',
            'categoria' => 'nullable|string|max:100',
        ]);

        Producto::create($data);

        return redirect()->route('producto.index')->with('success', 'Producto creado correctamente.');
    }

    /**
     * Display the specified producto
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified producto
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified producto in storage
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0.01',
            'cantidad' => 'required|integer|min:0',
            'sku' => 'required|string|unique:productos,sku,' . $producto->id,
            'categoria' => 'nullable|string|max:100',
        ]);

        $producto->update($data);

        return redirect()->route('producto.index')->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Remove the specified producto from storage
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('producto.index')->with('success', 'Producto eliminado correctamente.');
    }
}
