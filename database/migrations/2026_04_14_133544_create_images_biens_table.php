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
        Schema::create('image_biens', function (Blueprint $table) {
            $table->id();
            $table->integer("bien_id")->nullable(false);
            $table->string("url")->nullable(false);
            $table->foreign("bien_id")->references("id")->on("biens")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_biens');
    }
};
