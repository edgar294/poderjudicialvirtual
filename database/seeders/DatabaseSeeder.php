<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Crear Roles
        $admin  = Role::create(['name' => 'admin']);
        $client = Role::create(['name' => 'client']);

        // Crear usuario base
        $user = User::create([
            'name' => "Edgar Rojas",
            'email' => "edgar@correo.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $user->assignRole('admin');

        // Crear productos
        Producto::create([
            "nombre"   => "Producto 1",
            "precio"   => 123.45,
            "impuesto" => 5
        ]);

        Producto::create([
            "nombre"   => "Producto 2",
            "precio"   => 45.65,
            "impuesto" => 15
        ]);

        Producto::create([
            "nombre"   => "Producto 3",
            "precio"   => 39.73,
            "impuesto" => 12
        ]);

        Producto::create([
            "nombre"   => "Producto 4",
            "precio"   => 250,
            "impuesto" => 8
        ]);

        Producto::create([
            "nombre"   => "Producto 5",
            "precio"   => 59.35,
            "impuesto" => 10
        ]);
    }
}
