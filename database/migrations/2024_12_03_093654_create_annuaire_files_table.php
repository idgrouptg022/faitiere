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
        Schema::create('annuaire_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId("annuaire_id")->constrained()->cascadeOnDelete();
            $table->string("file");
            $table->enum("type", ["logo", "banner", "domaine_prior1", "domaine_prior2", "domaine_prior3", "presentation1", "presentation2", "presentation3", "presentation4", "partner"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annuaire_files');
    }
};
