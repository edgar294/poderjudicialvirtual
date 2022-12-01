<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    use HasFactory;

    protected $fillable = ["factura_id", "producto_id", "costo", "impuesto"];

    public function factura()
    {
        return $this->belongsTo(factura::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
