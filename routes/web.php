<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\WordController;
use App\Http\Controllers\Auth\EventController;
use App\Http\Controllers\Guest\MainController;
use App\Http\Controllers\Auth\BannerController;

use App\Http\Controllers\Auth\ActuVideoController;
use App\Http\Controllers\Auth\CommuneController;
use App\Http\Controllers\Auth\ContentController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\PrefectureController;
use App\Http\Controllers\Auth\RapportController;
use App\Http\Controllers\Auth\ContentController;
use App\Http\Controllers\Auth\ProjectController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\Auth\ActuVideoController;
use App\Http\Controllers\Auth\DashboardController;

Route::prefix("/")->as("guests:")->group(function () {
    Route::get("", [MainController::class, "home"])->name("home");

    Route::get("historique", [MainController::class, "historique"])->name("historique");

    Route::get("role-mission", [MainController::class, "role"])->name("role");

    Route::get("statuts-reglements", [MainController::class, "statut"])->name("statut");

    Route::get("organigramme", [MainController::class, "organigramme"])->name("organigramme");

    Route::get("mot-presidente", [MainController::class, "presidentWord"])->name("presidentWord");

    Route::get("partenaires", [MainController::class, "partenaires"])->name("partenaires");

    Route::get("contacts", [MainController::class, "contact"])->name("contact");



    Route::prefix("decentralisation/")->as("decentralisation:")->group(function () {

        Route::get("lois", [MainController::class, "lois"])->name("lois");

        Route::get("informations", [MainController::class, "informations"])->name("informations");
    });

    Route::prefix("projets/")->as("projets:")->group(function () {

        Route::get("plaidoyers", [MainController::class, "plaidoyers"])->name("plaidoyers");

        Route::get("en-cours", [MainController::class, "projetsEnCours"])->name("projetsEnCours");

        Route::get("realises", [MainController::class, "projetsRealises"])->name("projetsRealises");
    });

    Route::prefix("mediatheque/")->as("mediatheque:")->group(function () {

        Route::get("centre-national-ressources", [MainController::class, "ressources"])->name("ressources");

        Route::get("rapports-ag", [MainController::class, "rapportsAG"])->name("rapportsAG");

        Route::get("rapports-annuels", [MainController::class, "rapportsAnnuels"])->name("rapportsAnnuels");
    });

    Route::prefix("regions/")->as("carte:")->group(function () {
        Route::get('savanes', [MainController::class,'savanes'])->name('savanes');
        Route::get('kara', [MainController::class,'kara'])->name('kara');
        Route::get('centrale', [MainController::class,'centrale'])->name('centrale');
        Route::get('plateaux', [MainController::class,'plateaux'])->name('plateaux');
        Route::get('maritime', [MainController::class,'maritime'])->name('maritime');
    });

});

// Auth's routes
Route::prefix("auth/")->as("auth:")->group(function () {

    Route::get("tableau-de-bord", [DashboardController::class, "dashboard"])->name("dashboard");

    Route::prefix("bannieres/")->as("banner:")->group(function () {

        Route::get("", [BannerController::class, "index"])->name("index");

        Route::post("store", [BannerController::class, "store"])->name("store");

        Route::patch("{banner}/update-processing", [BannerController::class, "update"])->name("update");

        Route::delete("{banner}/destroy-processing", [BannerController::class, "destroy"])->name("destroy");
    });


    Route::prefix("presentation/")->as("presentation:")->group(function () {

        Route::get("", [ContentController::class, "presentationView"])->name("view");

        Route::post("store", [ContentController::class, "presentationStore"])->name("store");
    });

    Route::prefix("mot-president/")->as("presidentWord:")->group(function () {

        Route::get("", [ContentController::class, "presidentWordView"])->name("view");

        Route::post("store", [ContentController::class, "presidentWordStore"])->name("store");
    });

    Route::prefix("actu-videos/")->as("actuVideo:")->group(function() {

        Route::get("", [ActuVideoController::class, "index"])->name("index");

        Route::post("store", [ActuVideoController::class, "store"])->name("store");

        Route::patch("{actuVideo}/update", [ActuVideoController::class, "update"])->name("update");

        Route::delete("{actuVideo}/destroy", [ActuVideoController::class, "destroy"])->name("destroy");
    });

    Route::prefix("evenements/")->as("evenements:")->group(function () {

        Route::get("", [EventController::class, "index"])->name("index");

        Route::get("ajout-nouveau", [EventController::class, "create"])->name("create");

        Route::post("store", [EventController::class, "store"])->name("store");

        Route::get("{event}/details", [EventController::class, "show"])->name("show");

        Route::patch("{event}/update", [EventController::class, "update"])->name("update");

        Route::delete("{event}/destroy", [EventController::class, "destroy"])->name("destroy");

    });


    Route::prefix("activites_annuelles/")->as("activites_annuelles:")->group(function() {

        Route::get("", [RapportController::class, "activitesAnnuellesView"])->name("view");

        Route::post("store", [RapportController::class, "activitesAnnuellesStore"])->name("store");

        Route::patch("{activite}/update", [RapportController::class, "activitesAnnuellesUpdate"])->name("update");

        Route::delete("{id}/destroy", [RapportController::class, "rapportDestroy"])->name("destroy");
    });

    Route::prefix("assemblees/")->as("assemblees:")->group(function() {

        Route::get("", [RapportController::class, "assembleeView"])->name("view");

        Route::post("store", [RapportController::class, "assembleeStore"])->name("store");

        Route::patch("{assemblee}/update", [RapportController::class, "assembleeUpdate"])->name("update");

        Route::delete("{id}/destroy", [RapportController::class, "rapportDestroy"])->name("destroy");
    });

    Route::prefix("ressources/")->as("ressources:")->group(function() {

        Route::get("", [RapportController::class, "ressourcesView"])->name("view");

        Route::post("store", [RapportController::class, "ressourcesStore"])->name("store");

        Route::patch("{ressource}/update", [RapportController::class, "ressourcesUpdate"])->name("update");

        Route::delete("{id}/destroy", [RapportController::class, "rapportDestroy"])->name("destroy");
    });

    Route::prefix("prefectures/")->as("prefectures:")->group(function() {

        Route::get("", [PrefectureController::class, "index"])->name("index");

        Route::post("store", [PrefectureController::class, "Store"])->name("store");

        Route::patch("{prefecture}/update", [PrefectureController::class, "Update"])->name("update");

        Route::delete("{prefecture}/destroy", [PrefectureController::class, "Destroy"])->name("destroy");
    });

    Route::prefix("communes/")->as("communes:")->group(function() {

        Route::get("", [CommuneController::class, "index"])->name("index");

        Route::post("store", [CommuneController::class, "Store"])->name("store");

        Route::patch("{commune}/update", [CommuneController::class, "Update"])->name("update");

        Route::delete("{commune}/destroy", [CommuneController::class, "Destroy"])->name("destroy");
    });

    Route::prefix("projets/{projectType}/")->as("projects:")->group(function () {

        Route::get("", [ProjectController::class, "index"])->name("index");

        Route::post("nouveau", [ProjectController::class, "store"])->name("store");

        Route::patch("{project}/update", [ProjectController::class, "update"])->name("update");

        Route::delete("{project}/destroy", [ProjectController::class, "destroy"])->name("destroy");
    });

});
