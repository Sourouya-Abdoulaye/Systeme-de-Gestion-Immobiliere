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
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->integer("bien_id")->nullable(false);
            $table->integer("locataire_id")->nullable(false);
            $table->date("date_debut")->nullable(false);
            $table->date("date_fin")->nullable(false);
            $table->decimal("loyer", 10, 2)->nullable(false);
            $table->decimal("caution", 10, 2)->nullable(false);
            $table->enum("statut",["actif", "termine"])->nullable(false);
            $table->foreign("bien_id")->references("id")->on("biens")->onDelete("cascade");
            $table->foreign("locataire_id")->references("id")->on("locataires")->onDelete("cascade");
         



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrats');
    }
};
