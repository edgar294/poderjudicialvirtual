<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Factura;
use App\Models\DetalleFactura;
use App\Models\User;

class FacturaController extends Controller
{
    public function generateBills(Request $request)
    {
        $users = User::all();

        foreach ($users as $user) {
            $compras = $user->compras()->where('facturado', false)->get();
            if ($compras->count()){
                $this->makeBill($user, $compras);
            }
        }

        return redirect('escritorio#facturas');
    }

    public function showBill(Request $request)
    {
        $id = $request->id;
        $bill = Factura::findOrFail($id);

        // return $bill;
        //
        return redirect('/escritorio#detallefactura')->with(['bill' => $bill]);
    }

    private function makeBill(User $user, Collection $compras)
    {
        $totalCosto = 0;
        $totalImpuesto = 0;

        $factura = Factura::create([
            "user_id" => $user->id,
            "total_costo" => 0,
            "total_impuesto" => 0
        ]);

        foreach ($compras as $compra) {
            $porcentaje = $compra->impuesto / 100;
            $costo = $compra->precio / ($porcentaje + 1);
            $impuesto = $compra->precio - $costo;
            $totalCosto += $costo;
            $totalImpuesto += $impuesto;

            $detalleFactura = DetalleFactura::create([
               "factura_id" => $factura->id,
               "producto_id" => $compra->producto_id,
               "costo" => $costo,
               "impuesto" => $impuesto
            ]);

            $compra->facturado = true;
            $compra->save();
        }

        $factura->total_costo = $totalCosto;
        $factura->total_impuesto = $totalImpuesto;
        $factura->save();
    }
}
