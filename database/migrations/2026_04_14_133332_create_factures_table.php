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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->integer("contrat_id")->nullable(false);
            // date a laquelle la facture est generee
            $table->date("date_emission")->nullable(false);
            // date a laquelle le locataire doit payer la facture
            $table->date("date_echeance")->nullable(false);
            $table->decimal("montant", 10, 2)->nullable(false);
            $table->enum("statut",["payer", "impayer"])->default("impayer");
            $table->foreign("contrat_id")->references("id")->on("contrats")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
