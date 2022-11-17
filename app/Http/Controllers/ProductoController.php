<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        return Producto::paginate();
    }

    public function create()
    {
        return redirect(route('productos.create'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return redirect(route('productos.show'));
    }

    public function edit($id)
    {
        return redirect(route('productos.edit'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
