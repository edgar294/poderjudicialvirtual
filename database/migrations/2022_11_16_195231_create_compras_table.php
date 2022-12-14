<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('producto_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('precio', 8, 2)->comment('Precio del producto sin impuesto incluido');
            $table->decimal('impuesto', 8, 2)->comment('Impuesto');
            $table->boolean('facturado')->default(0)->comment('Si la compra fue facturada o no');
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
        Schema::dropIfExists('compras');
    }
}
