<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('churros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tipo')->constrained('tipos');
            $table->dateTime('fecha_vencimiento');
            $table->integer('cantidad');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('churros');
    }
};
