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
            $table->integer("proprietaire_id")->nullable(false);
            $table->string("titre")->nullable(false);
            $table->text("description");
            $table->enum("type",["maison", "appartement", "terrain", "bureau"])->nullable(false);
            $table->string("adresse")->nullable(false);
            $table->string("ville")->nullable(false);
            $table->string("pays")->nullable(false);
            $table->decimal("prix", 10, 2)->nullable(false);
            $table->enum("statut",["disponible", "loue", "vendu"])->nullable(false);
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
