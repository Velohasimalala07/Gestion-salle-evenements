<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('materiels', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }
    public function up()
{
    Schema::create('materiels', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->text('description');
        $table->integer('prix');
        $table->integer('quantite');
        $table->string('image')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiels');
    }
};
