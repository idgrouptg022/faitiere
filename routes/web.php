<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\EventController;
use App\Http\Controllers\Guest\MainController;
use App\Http\Controllers\Auth\BannerController;
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
});
