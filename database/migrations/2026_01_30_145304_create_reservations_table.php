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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            // Date et heure de réservation
            $table->date('date_reservation');
            $table->time('heure_debut');
            $table->time('heure_fin');

            // Salle concernée
            $table->unsignedBigInteger('salle_id');

            // Montant total
            $table->integer('total');

            // Timestamps Laravel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
