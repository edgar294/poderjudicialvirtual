<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "total_costo", "total_impuesto"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }

    public function detalles()
    {
        return $this->hasMany(DetalleFactura::class);
    }
}
