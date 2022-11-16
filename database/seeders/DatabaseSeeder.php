<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
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
