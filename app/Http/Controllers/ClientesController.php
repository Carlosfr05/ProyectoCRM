<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use Illuminate\Support\Facades\Storage;

class ClientesController extends Controller
{
    //

    /** Display a listing of clientes */
    public function index()
    {
        $clientes = Clientes::latest()->paginate(10);
        return view('cliente.index', compact('clientes'));
    }

    /** Show the form for creating a new cliente */
    public function create()
    {
        return view('cliente.create');
    }

    /** Store a newly created cliente in storage */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'telefono' => 'nullable|string|max:50',
            'direccion' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Procesar la foto si se envió
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('clientes', 'public');
        }

        Clientes::create($data);

        return redirect()->route('cliente.index')->with('success', 'Cliente creado correctamente.');
    }

    /** Display the specified cliente */
    public function show($id)
    {
        $cliente = Clientes::findOrFail($id);
        return view('cliente.show', compact('cliente'));
    }

    /** Show the form for editing the specified cliente */
    public function edit($id)
    {
        $cliente = Clientes::findOrFail($id);
        return view('cliente.edit', compact('cliente'));
    }

    /** Update the specified cliente in storage */
    public function update(Request $request, $id)
    {
        $cliente = Clientes::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'telefono' => 'nullable|string|max:50',
            'direccion' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Procesar la foto si se envió
        if ($request->hasFile('foto')) {
            // Eliminar foto anterior si existe
            if ($cliente->foto && Storage::disk('public')->exists($cliente->foto)) {
                Storage::disk('public')->delete($cliente->foto);
            }
            // Guardar nueva foto
            $data['foto'] = $request->file('foto')->store('clientes', 'public');
        }

        $cliente->update($data);

        return redirect()->route('cliente.index')->with('success', 'Cliente actualizado correctamente.');
    }

    /** Remove the specified cliente from storage */
    public function destroy($id)
    {
        $cliente = Clientes::findOrFail($id);
        
        // Eliminar foto si existe
        if ($cliente->foto && Storage::disk('public')->exists($cliente->foto)) {
            Storage::disk('public')->delete($cliente->foto);
        }
        
        $cliente->delete();

        return redirect()->route('cliente.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
