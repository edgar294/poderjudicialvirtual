<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Producto;

class CompraController extends Controller
{
    public function buyProduct(Request $request, Producto $producto)
    {
        $user = auth()->user();
        $price = $producto->precio;
        $tax = $producto->impuesto;

        Compra::create([
            'user_id' => $user->id,
            'producto_id' => $producto->id,
            'precio' => $producto->precio,
            'impuesto' => $producto->impuesto
        ]);

        return redirect(route('compras.index'));
    }
}
