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
        // peut etre une grande maison ou un appartement ou un terrain ou un bureau
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            $table->integer('proprietaire_id');
            $table->string("titre");
            $table->text("description")->nullable();
            $table->enum("type", ["maison", "appartement", "terrain", "bureau"]);
            $table->string("adresse");
            $table->string("ville");
            $table->string("pays");
            $table->decimal("prix", 10, 2);
            $table->enum("statut", [
                "brouillon",   // Le proprio prépare l'annonce mais ne veut pas encore la montrer
                "en_attente",  // L'annonce est soumise mais attend la validation de l'admin
                "disponible",     // L'annonce est en ligne et visible
                "loue",        // Le bien est occupé
                "vendu",       // Le bien a été vendu
                "archive"      // Masqué sans être supprimé
            ])->default('brouillon');

            $table->foreign("proprietaire_id")->references("id")->on("proprietaires")->onDelete("cascade");
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biens');
    }
};
