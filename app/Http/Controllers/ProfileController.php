<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar el perfil del usuario autenticado
     */
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    /**
     * Actualizar el perfil del usuario
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($data);

        return redirect()->route('profile.show')->with('success', 'Perfil actualizado correctamente.');
    }

    /**
     * Mostrar formulario para cambiar contraseña
     */
    public function changePasswordForm()
    {
        return view('profile.change-password');
    }

    /**
     * Actualizar la contraseña del usuario
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('La contraseña actual es incorrecta.');
                    }
                },
            ],
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->update([
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('profile.show')->with('success', 'Contraseña actualizada correctamente.');
    }
}
