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
        Schema::create('unites', function (Blueprint $table) {
            $table->id();
            $table->integer("bien_id")->nullable(false);
            // le nom de l'appartemet ex: appartement 1, appartement 2, maison 1, maison 2
            $table->string("nom")->nullable(false);
            $table->integer("nombre_chambres")->nullable(false);
            $table->decimal("prix", 10, 2)->nullable(false);
            $table->foreign("bien_id")->references("id")->on("biens")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unites');
    }
};
