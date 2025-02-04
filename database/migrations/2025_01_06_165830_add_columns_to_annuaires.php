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
        Schema::table('annuaires', function (Blueprint $table) {
            $table->string("barrages_hydrauliques")->nullable()->after("agences_bancaires");
            $table->string("etablissements_scolaires")->nullable()->after("barrages_hydrauliques");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('annuaires', function (Blueprint $table) {
            //
        });
    }
};
