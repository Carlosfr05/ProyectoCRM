<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Empleado;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stats = [
            'clientes' => Clientes::count(),
            'productos' => Producto::count(),
            'proveedores' => Proveedor::count(),
            'empleados' => Empleado::count(),
            'sucursales' => Sucursal::count(),
        ];

        return view('home', compact('stats'));
    }
}
