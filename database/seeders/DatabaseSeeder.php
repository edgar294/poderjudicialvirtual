<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Crear usuario base
        User::create([
            'name' => "Edgar Rojas",
            'email' => "edgarrojas2904@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

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
