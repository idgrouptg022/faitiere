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
        Schema::create('annuaire_responsables', function (Blueprint $table) {
            $table->id();
            $table->foreignId("annuaire_id")->constrained()->cascadeOnDelete();
            $table->string("name");
            $table->enum("type", ["maire", "adjoint1", "adjoint2"]);
            $table->string("file");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annuaire_responsables');
    }
};
