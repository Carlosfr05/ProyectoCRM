<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::latest()->paginate(10);
        return view('empleado.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleado.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'nullable|email|unique:empleados,email',
            'telefono' => 'nullable|string|max:50',
            'direccion' => 'nullable|string',
            'puesto' => 'nullable|string|max:100',
            'salario' => 'nullable|numeric|min:0',
            'fecha_contratacion' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Procesar la foto si se envió
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('empleados', 'public');
        }

        Empleado::create($data);

        return redirect()->route('empleado.index')->with('success', 'Empleado creado correctamente.');
    }

    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleado.show', compact('empleado'));
    }

    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'nullable|email|unique:empleados,email,' . $empleado->id,
            'telefono' => 'nullable|string|max:50',
            'direccion' => 'nullable|string',
            'puesto' => 'nullable|string|max:100',
            'salario' => 'nullable|numeric|min:0',
            'fecha_contratacion' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Procesar la foto si se envió
        if ($request->hasFile('foto')) {
            // Eliminar foto anterior si existe
            if ($empleado->foto && Storage::disk('public')->exists($empleado->foto)) {
                Storage::disk('public')->delete($empleado->foto);
            }
            // Guardar nueva foto
            $data['foto'] = $request->file('foto')->store('empleados', 'public');
        }

        $empleado->update($data);

        return redirect()->route('empleado.index')->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        
        // Eliminar foto si existe
        if ($empleado->foto && Storage::disk('public')->exists($empleado->foto)) {
            Storage::disk('public')->delete($empleado->foto);
        }
        
        $empleado->delete();

        return redirect()->route('empleado.index')->with('success', 'Empleado eliminado correctamente.');
    }
}
