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
        Schema::create('commune_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commune_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('population')->nullable();
            $table->string('superficie')->nullable();
            $table->string('townhall')->nullable();
            $table->string('nom_maire')->nullable();
            $table->string('contact')->nullable();
            $table->string('lien_siteweb')->nullable();
            $table->string('localisation')->nullable();
            $table->string('contact_mail')->nullable();
            $table->string('contact_whatsapp')->nullable();
            $table->string('business')->nullable();
            $table->string('public_markets')->nullable();
            $table->string('jumelage')->nullable();
            $table->string('bureau_citoyen')->nullable();
            $table->boolean('annexe_exists')->nullable();
            $table->string('administratif')->nullable();
            $table->string('taxe')->nullable();
            $table->string('be_partner')->nullable();
            $table->string('give_project')->nullable();
            $table->string('realization')->nullable();
            $table->string('contact_message')->nullable();
            $table->string('sante')->nullable();
            $table->string('emploi')->nullable();
            $table->string('social')->nullable();
            $table->string('urbanisme')->nullable();
            $table->string('environnement')->nullable();
            $table->string('tourisme')->nullable();
            $table->string('education')->nullable();
            $table->string('culture')->nullable();
            $table->string('securite')->nullable();
            $table->string('slug')->nullable();
            $table->string('district')->nullable();
            $table->boolean('active')->nullable();
            $table->string('heure_debut')->nullable();
            $table->string('heure_fin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commune_links');
    }
};
