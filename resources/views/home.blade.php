@extends('layouts.app')

@section('content_header_title', 'Dashboard')

@section('content_body')

    <!-- Bienvenida -->
    <div class="bienvenida_dashboard mb-4">
        <h4>Bienvenido, <strong>{{ Auth::user()->name }}</strong></h4>
        <p class="text-muted">
            <span class="badge badge-{{ Auth::user()->isAdmin() ? 'danger' : 'info' }}">
                {{ Auth::user()->isAdmin() ? 'Administrador' : 'Usuario' }}
            </span>
        </p>
    </div>

    <!-- Estadísticas -->
    <div class="row">
        <!-- Clientes -->
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('cliente.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="card-body text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-2">Clientes</h6>
                                <h2 class="mb-0">{{ $stats['clientes'] }}</h2>
                            </div>
                            <i class="fas fa-users fa-3x" style="opacity: 0.2;"></i>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top border-white">
                        <small class="text-white">
                            <i class="fas fa-arrow-right"></i> Ver todos
                        </small>
                    </div>
                </div>
            </a>
        </div>

        <!-- Productos -->
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('producto.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <div class="card-body text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-2">Productos</h6>
                                <h2 class="mb-0">{{ $stats['productos'] }}</h2>
                            </div>
                            <i class="fas fa-box fa-3x" style="opacity: 0.2;"></i>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top border-white">
                        <small class="text-white">
                            <i class="fas fa-arrow-right"></i> Ver todos
                        </small>
                    </div>
                </div>
            </a>
        </div>

        <!-- Proveedores -->
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('proveedor.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <div class="card-body text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-2">Proveedores</h6>
                                <h2 class="mb-0">{{ $stats['proveedores'] }}</h2>
                            </div>
                            <i class="fas fa-truck fa-3x" style="opacity: 0.2;"></i>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top border-white">
                        <small class="text-white">
                            <i class="fas fa-arrow-right"></i> Ver todos
                        </small>
                    </div>
                </div>
            </a>
        </div>

        <!-- Empleados -->
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('empleado.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                    <div class="card-body text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-2">Empleados</h6>
                                <h2 class="mb-0">{{ $stats['empleados'] }}</h2>
                            </div>
                            <i class="fas fa-briefcase fa-3x" style="opacity: 0.2;"></i>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top border-white">
                        <small class="text-white">
                            <i class="fas fa-arrow-right"></i> Ver todos
                        </small>
                    </div>
                </div>
            </a>
        </div>

        <!-- Sucursales -->
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route('sucursal.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);">
                    <div class="card-body text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-2">Sucursales</h6>
                                <h2 class="mb-0">{{ $stats['sucursales'] }}</h2>
                            </div>
                            <i class="fas fa-store fa-3x" style="opacity: 0.2;"></i>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top border-white">
                        <small class="text-white">
                            <i class="fas fa-arrow-right"></i> Ver todos
                        </small>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                <div class="card-body text-dark">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-2">Total Registros</h6>
                            <h2 class="mb-0">
                                {{ $stats['clientes'] + $stats['productos'] + $stats['proveedores'] + $stats['empleados'] + $stats['sucursales'] }}
                            </h2>
                        </div>
                        <i class="fas fa-chart-bar fa-3x" style="opacity: 0.2; color: #333;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Panel de información del usuario -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-user-circle mr-2"></i>Mi Información</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Rol:</strong> <span class="badge badge-{{ Auth::user()->isAdmin() ? 'danger' : 'info' }}">{{ Auth::user()->isAdmin() ? 'Administrador' : 'Usuario' }}</span></p>
                    <hr>
                    <a href="{{ route('profile.show') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit mr-1"></i>Editar Perfil
                    </a>
                    <a href="{{ route('profile.change-password') }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-key mr-1"></i>Cambiar Contraseña
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-info-circle mr-2"></i>Información del Sistema</h5>
                </div>
                <div class="card-body">
                    <p><strong>Plataforma:</strong> ProyectoCRM</p>
                    <p><strong>Fecha Actual:</strong> {{ now()->format('d/m/Y H:i:s') }}</p>
                    <p><strong>Miembro desde:</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
                    <hr>
                    <p class="text-muted mb-0"><small>Sistema de gestión moderno y seguro</small></p>
                </div>
            </div>
        </div>
    </div>

    <style>
        a.text-decoration-none {
            text-decoration: none !important;
        }

        .card {
            transition: all 0.3s ease;
        }

        a .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.2) !important;
        }

        .card-title {
            font-size: 0.9rem;
            font-weight: 600;
            opacity: 0.9;
        }
    </style>

@endsection
