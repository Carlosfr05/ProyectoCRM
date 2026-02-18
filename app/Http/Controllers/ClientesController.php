<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

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
        ]);

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
        ]);

        $cliente->update($data);

        return redirect()->route('cliente.index')->with('success', 'Cliente actualizado correctamente.');
    }

    /** Remove the specified cliente from storage */
    public function destroy($id)
    {
        $cliente = Clientes::findOrFail($id);
        $cliente->delete();

        return redirect()->route('cliente.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
