<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Log;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    public function index()
    {
        return Producto::paginate();
    }

    public function create()
    {
        return redirect('/escritorio#nuevo-producto')->with(['showForm' => true]);
    }

    public function store(Request $request)
    {
        try{
            $validator = $this->validateRequest($request);
            if (count($validator)) {
                return redirect('/escritorio#nuevo-producto')->with($validator);
            }

            Producto::create([
                "nombre" => $request->name,
                "precio" => $request->price,
                "impuesto" => $request->tax,
            ]);

            return redirect(route('productos.index'))->with(['success' => "Producto Agregado exitosamente"]);

        } catch (\Exception $e) {
            Log::debug($e);
            return redirect('/escritorio#nuevo-producto')
                            ->with(['errors' => "Ocurrio un error en el servidor, por favor intentalo mas tarde"]);
        }
    }

    public function show($producto)
    {
        return redirect(route('productos.show'));
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return redirect('/escritorio#nuevo-producto')->with(['showForm' => true, 'product' => $producto]);
    }

    public function update(Request $request, $id)
    {
        try{
            $validator = $this->validateRequest($request);
            if (count($validator)) {
                return redirect('/escritorio#nuevo-producto')->with($validator);
            }

            $producto = Producto::findOrFail($request->id);
            $producto->nombre   = $request->name;
            $producto->precio   = $request->price;
            $producto->impuesto = $request->tax;
            $producto->save();

            return redirect(route('productos.index'))->with(['success' => "Producto Editado exitosamente"]);
        } catch (\Exception $e) {
            Log::debug($e);
            return redirect('/escritorio#nuevo-producto')
                        ->with(['errors' => "Ocurrio un error en el servidor, por favor intentalo mas tarde"]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $producto = Producto::findOrFail($request->id);
            $producto->delete();
            return redirect(route('productos.index'))->with(['success' => "Producto eliminado exitosamente"]);

        } catch(\Exception $e) {
            Log::debug($e);
            return redirect(route('productos.index'))->with(['error' => "Ocurrio un error, intentalo mas tarde por favor"]);
        }
    }

    public function cancel()
    {
        return redirect(route('productos.index'))->with(['error' => "Ocurrio un error, intentalo mas tarde por favor"]);
    }

    private function validateRequest(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255', 'min: 5'],
            'price' => ['required'],
            'tax' => ['required'],
        ]);

        if (!$validator->fails()) {
            return [];
        }

        $messages = "</br></br>";
        $errors = $validator->errors();
        foreach ($errors->getMessages() as $message) {
            foreach ($message as $value) {
                $messages .= $value . "</br>";
            }
        }

        $messages .= "</br>";
        $producto = new Producto();
        $producto->id = $request->id ?? "";
        $producto->nombre = $request->name ?? "";
        $producto->precio = $request->price ?? "";
        $producto->impuesto = $request->tax ?? "";

        return [
            'showForm' => true,
            'product' => $producto,
            'errors' => "Se han encontrado los siguientes errores: " . $messages. "Por favor vefica los datos enviados"
        ];
    }
}
