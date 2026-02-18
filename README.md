# ProyectoSGE - Sistema de Gestión Empresarial

## Descripción del Proyecto

ProyectoSGE es un **Sistema de Gestión Empresarial (ERP)** construido con **Laravel 12** y **AdminLTE 3**. 

El sistema proporciona herramientas completas para gestionar:
- **Productos**: Inventario, precios, categorías y stock
- **Proveedores**: Información de contacto, empresas y direcciones
- **Empleados**: Base de datos de recursos humanos con datos de contratación y salarios
- **Sucursales**: Gestión de ubicaciones, horarios y gerentes

Características principales:
- 🎨 Interfaz moderna con tema oscuro y accentes en morado
- 📊 Dashboard intuitivo con AdminLTE 3
- 🔐 Sistema de autenticación y gestión de usuarios
- 📱 Diseño responsivo compatible con dispositivos móviles

---

## Requisitos para Ejecutarlo

### Software Requerido
- **PHP 8.2 o superior**
- **Composer** (gestor de dependencias PHP)
- **Node.js 18+** y **npm** (para compilar assets)
- **MySQL 5.7+** (base de datos)
- **XAMPP** (incluye Apache, PHP y MySQL) - recomendado para desarrollo local

### Dependencias PHP
Las dependencias principales incluyen:
- Laravel Framework 12.x
- AdminLTE 3
- Laravel Breeze (autenticación)

### Dependencias Node.js
- Vite
- Bootstrap 5
- jQuery
- Font Awesome

---

## Pasos de Instalación

### 1. Clonar o descargar el proyecto

```bash
cd c:\xampp\htdocs
git clone <> ProyectoSGE
cd ProyectoSGE
```

### 2. Instalar dependencias PHP

```bash
composer install
```

### 3. Configurar archivo de entorno

```bash
copy .env.example .env
```

Edita el archivo `.env` y configura:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ProyectoCRM
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generar clave de aplicación

```bash
php artisan key:generate
```

### 5. Instalar dependencias Node.js

```bash
npm install
```

### 6. Ejecutar migraciones y seeders

```bash
php artisan migrate --seed
```

Este comando creará todas las tablas y poblará la base de datos con datos de ejemplo, incluyendo el usuario administrador.

### 7. Compilar assets (para desarrollo)

```bash
npm run dev
```

Para producción:
```bash
npm run build
```

### 8. Limpiar cachés

```bash
php artisan view:clear
php artisan cache:clear
```

### 9. Iniciar servidor de desarrollo

```bash
php artisan serve
```

La aplicación estará disponible en: `http://localhost:8000`

---

## Usuario y Contraseña de Prueba

### Credenciales Admin

| Campo | Valor |
|-------|-------|
| **Email** | `admin@admin.com` |
| **Contraseña** | `adminadmin` |
| **Nombre** | admin |

Estas credenciales se crean automáticamente al ejecutar el seeder (`php artisan migrate --seed`).

### Usuario de Prueba Adicional

| Campo | Valor |
|-------|-------|
| **Email** | `test@example.com` |
| **Contraseña** | `password` (generada por factory) |
| **Nombre** | Test User |

---

## Estructura del Proyecto

```
ProyectoSGE/
├── app/
│   ├── Http/Controllers/       # Controladores (Producto, Proveedor, Empleado, Sucursal)
│   ├── Models/                 # Modelos (User, Clientes, Producto, etc.)
│   └── Providers/              # Proveedores de servicio
├── database/
│   ├── migrations/             # Migraciones de base de datos
│   ├── factories/              # Factories para seeding
│   └── seeders/                # Seeders de datos
├── resources/
│   ├── css/                    # Estilos personalizados
│   ├── js/                     # Scripts JavaScript
│   └── views/                  # Vistas Blade
├── routes/                     # Definición de rutas
├── public/                     # Assets públicos compilados
├── config/                     # Archivos de configuración
└── vendor/                     # Dependencias Composer
```

---

## Operaciones Comunes

### Crear una nueva migración
```bash
php artisan make:migration create_tabla_table
```

### Crear un nuevo modelo con controlador
```bash
php artisan make:model NombreModelo -c
```

### Ejecutar migraciones
```bash
php artisan migrate
```

### Deshacer la última migración
```bash
php artisan migrate:rollback
```

### Compilar assets en modo desarrollo (con hot reload)
```bash
npm run dev
```

### Compilar assets para producción
```bash
npm run build
```

### Ejecutar tests
```bash
php artisan test
```

---

## Contacto y Soporte

Para más información sobre Laravel, visita [laravel.com](https://laravel.com)

Para documentación de AdminLTE, consulta [adminlte.io](https://adminlte.io)

---

## Licencia

Este proyecto utiliza el framework Laravel, que está bajo la licencia MIT.

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
