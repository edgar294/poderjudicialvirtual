<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_facturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('factura_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('producto_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('costo', 8, 2)->comment('Costo del producto');
            $table->decimal('impuesto', 8, 2)->comment('Impuesto sobre el producto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_facturas');
    }
}
