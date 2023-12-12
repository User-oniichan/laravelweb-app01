<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_ests', function (Blueprint $table) {
            $table->id();
            $table->string('praMod1');
            $table->string('praMod2');
            $table->string('praMod3');
            $table->string('udMod1');
            $table->string('udMod1');
            $table->string('udMod3');
            $table->string('cerIdi');
            $table->string('modTit');
            $table->date('fecDet');
            $table->string('estDet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalleest');
    }
};
