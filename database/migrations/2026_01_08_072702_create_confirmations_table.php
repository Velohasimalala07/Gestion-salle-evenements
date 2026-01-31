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
        Schema::create('confirmations', function (Blueprint $table) {
    $table->id();
    $table->string('salle_nom');
    $table->integer('salle_capacite');
    $table->integer('salle_prix');
    $table->text('materiels')->nullable();
    $table->date('date')->unique();
    $table->time('heure_debut');
    $table->time('heure_fin');
    $table->integer('total');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirmations');
    }
};
