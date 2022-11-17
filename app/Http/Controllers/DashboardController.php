<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Compra;
use App\Models\Factura;
use App\Models\Producto;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        $isAdmin = $user->hasRole('admin');
        if ($isAdmin) {
            $compras = Compra::all();
            $facturas = Factura::all();
        } else {
            $compras = $user->compras;
            $facturas = $user->facturas;
        }

        $productos = Producto::all();

        return view('dashboard', compact('compras', 'facturas', 'productos'));
    }
}
