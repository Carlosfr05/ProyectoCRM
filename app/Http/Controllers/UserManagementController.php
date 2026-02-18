<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index()
    {
        // Solo admins pueden acceder
        if (!auth()->user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'No tienes permiso para acceder a la gestión de usuarios.');
        }

        $users = User::latest()->paginate(10);
        return view('user-management.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        if (!auth()->user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'No tienes permiso.');
        }

        return view('user-management.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'No tienes permiso.');
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:user,admin',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Display the specified user.
     */
    public function show($id)
    {
        if (!auth()->user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'No tienes permiso.');
        }

        $user = User::findOrFail($id);
        return view('user-management.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        if (!auth()->user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'No tienes permiso.');
        }

        $user = User::findOrFail($id);
        return view('user-management.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'No tienes permiso.');
        }

        $user = User::findOrFail($id);

        // No permitir modificar el propio usuario si es el último admin
        if ($user->id === auth()->id() && $user->isAdmin() && User::whereRole('admin')->count() === 1 && $request->input('role') === 'user') {
            return redirect()->back()->with('error', 'No puedes cambiar el rol del último administrador.');
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:user,admin',
        ]);

        // Si se proporciona una nueva contraseña
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:6|confirmed',
            ]);
            $data['password'] = Hash::make($request->input('password'));
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        if (!auth()->user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'No tienes permiso.');
        }

        $user = User::findOrFail($id);

        // No permitir eliminar el propio usuario
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'No puedes eliminar tu propia cuenta.');
        }

        // No permitir eliminar si es el único admin
        if ($user->isAdmin() && User::whereRole('admin')->count() === 1) {
            return redirect()->back()->with('error', 'No puedes eliminar el último administrador.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }

    /**
     * Change user role.
     */
    public function changeRole(Request $request, $id)
    {
        if (!auth()->user()->isAdmin()) {
            return response()->json(['error' => 'No tienes permiso.'], 403);
        }

        $user = User::findOrFail($id);

        // Prevenir cambiar el rol del único admin
        if ($user->isAdmin() && User::whereRole('admin')->count() === 1 && $request->input('role') === 'user') {
            return response()->json(['error' => 'No puedes cambiar el rol del último administrador.'], 403);
        }

        $newRole = $request->input('role') === 'admin' ? 'admin' : 'user';
        $user->update(['role' => $newRole]);

        return response()->json(['success' => true, 'role' => $newRole]);
    }
}
