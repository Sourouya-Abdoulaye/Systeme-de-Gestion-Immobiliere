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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();

//             - id
// - contrat_id
// - montant
// - date_paiement
// - methode (cash, mobile money, banque)
// - statut (paye, en attente)


            $table->integer("contrat_id")->nullable(false);
            $table->date("date_paiement")->nullable(false);
            $table->decimal("montant", 10, 2)->nullable(false);
            $table->enum("mode_paiement",["espece", "mobile", "banque"])->nullable(false);
            $table->enum("statut",["payer", "en attente"])->default("en attente");
            $table->foreign("contrat_id")->references("id")->on("contrats")->onDelete("cascade");   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
