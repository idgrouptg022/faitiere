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
        Schema::create('annuaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId("commune_id")->constrained()->cascadeOnDelete();
            $table->string("domaine_prior1");
            $table->string("domaine_prior2");
            $table->string("domaine_prior3");
            $table->string("superficie");
            $table->string("population");
            $table->longText("vision");
            $table->longText("presentation");
            $table->string("sante");
            $table->string("hotels")->nullable();
            $table->string("prescolaires")->nullable();
            $table->string("primaires")->nullable();
            $table->string("secondaires")->nullable();
            $table->string("artisanaux")->nullable();
            $table->string("agences_bancaires")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annuaires');
    }
};
