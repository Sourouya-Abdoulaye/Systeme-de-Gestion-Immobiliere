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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->integer("bien_id")->nullable(false);
            $table->integer("locataire_id")->nullable(false);
            $table->text("description")->nullable(false);
            $table->enum("statut",["en attente", "en cours", "termine"])->default("en attente");
            $table->date("date_demande")->nullable(false);
            $table->enum("priorite",["faible", "moyenne", "elevee"])->default("moyenne");
            $table->foreign("bien_id")->references("id")->on("biens")->onDelete("cascade");
            $table->foreign("locataire_id")->references("id")->on("locataires")->onDelete("cascade");
            // le cout estime est le cout que le locataire pense que la maintenance va couter, 
            // $table->decimal("cout_estime", 10, 2)->nullable(true);
            // le cout reel est le cout que le proprietaire a depense pour la maintenance
            // $table->decimal("cout_reel", 10, 2)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
