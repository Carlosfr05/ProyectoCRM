<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;

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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'adjunto' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,txt|max:5120',
        ]);

        // Procesar la foto si se envió
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('productos', 'public');
        }

        // Procesar el adjunto si se envió
        if ($request->hasFile('adjunto')) {
            $data['adjunto'] = $request->file('adjunto')->store('productos/adjuntos', 'public');
        }

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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'adjunto' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,txt|max:5120',
        ]);

        // Procesar la foto si se envió
        if ($request->hasFile('foto')) {
            // Eliminar foto anterior si existe
            if ($producto->foto && Storage::disk('public')->exists($producto->foto)) {
                Storage::disk('public')->delete($producto->foto);
            }
            // Guardar nueva foto
            $data['foto'] = $request->file('foto')->store('productos', 'public');
        }

        // Procesar el adjunto si se envió
        if ($request->hasFile('adjunto')) {
            // Eliminar adjunto anterior si existe
            if ($producto->adjunto && Storage::disk('public')->exists($producto->adjunto)) {
                Storage::disk('public')->delete($producto->adjunto);
            }
            // Guardar nuevo adjunto
            $data['adjunto'] = $request->file('adjunto')->store('productos/adjuntos', 'public');
        }

        $producto->update($data);

        return redirect()->route('producto.index')->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Remove the specified producto from storage
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        
        // Eliminar foto si existe
        if ($producto->foto && Storage::disk('public')->exists($producto->foto)) {
            Storage::disk('public')->delete($producto->foto);
        }

        // Eliminar adjunto si existe
        if ($producto->adjunto && Storage::disk('public')->exists($producto->adjunto)) {
            Storage::disk('public')->delete($producto->adjunto);
        }
        
        $producto->delete();

        return redirect()->route('producto.index')->with('success', 'Producto eliminado correctamente.');
    }
}
