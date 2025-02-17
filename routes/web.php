<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\WordController;
use App\Http\Controllers\Auth\EventController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\MainController;
use App\Http\Controllers\Auth\BannerController;

use App\Http\Controllers\Guest\AboutController;
use App\Http\Controllers\Auth\AnnonceController;

use App\Http\Controllers\Auth\CommuneController;
use App\Http\Controllers\Auth\ContentController;
use App\Http\Controllers\Auth\PartnerController;
use App\Http\Controllers\Auth\ProjectController;
use App\Http\Controllers\Auth\RapportController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\Auth\MagazineController;
use App\Http\Controllers\Auth\MessagesController;
use App\Http\Controllers\Guest\ContactController;
use App\Http\Controllers\Auth\ActualiteController;
use App\Http\Controllers\Auth\ActuVideoController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\PlaquetteController;
use App\Http\Controllers\Auth\PubliciteController;
use App\Http\Controllers\Auth\QuotationController;
use App\Http\Controllers\Auth\PrefectureController;
use App\Http\Controllers\Auth\CommuneLinkController;
use App\Http\Controllers\Auth\MapLocationController;
use App\Http\Controllers\Guest\MediathequeController;
use App\Http\Controllers\Auth\ActiviteAnnuelleController;

use App\Http\Controllers\Auth\AnnuaireAtoutController;

use App\Http\Controllers\Auth\AnnuaireController;
use App\Http\Controllers\Auth\AnnuaireFileController;
use App\Http\Controllers\Auth\AnnuaireResponsableController;
use App\Http\Controllers\Auth\ThematiqueController;
use App\Http\Controllers\Auth\TwitterPostController;
use App\Http\Controllers\Guest\MapLocalisationController;
use App\Http\Controllers\Guest\DecentralisationController;
use App\Http\Controllers\Guest\EventController as GuestEventController;
use App\Http\Controllers\Guest\ProjectController as GuestProjectController;
use App\Http\Controllers\Guest\MagazineController as GuestMagazineController;
use App\Http\Controllers\Guest\ActualiteController as GuestActualiteController;
use App\Http\Controllers\Guest\ActuVideoController as GuestActuVideoController;
use App\Http\Controllers\Guest\NewsletterContactController;
use App\Http\Controllers\Guest\ThematiqueController as GuestThematiqueController;

Route::prefix("/")->as("guests:")->group(function () {

    Route::get("", [HomeController::class, "home"])->name("home");

    Route::get("historique", [AboutController::class, "historique"])->name("historique");

    Route::get("presentation", [AboutController::class, "presentation"])->name("presentation");

    Route::get("valeur-mission", [AboutController::class, "role_mission"])->name("role");

    Route::get("statuts-reglements", [AboutController::class, "statut"])->name("statut");

    Route::get("organigramme", [AboutController::class, "organigramme"])->name("organigramme");

    Route::get("mot-presidente", [AboutController::class, "presidentWord"])->name("presidentWord");

    Route::get("partenaires", [AboutController::class, "partner"])->name("partenaires");

    Route::get("fct-mag", [GuestMagazineController::class, "index"])->name("magazine");

    Route::get("fct-mag/download/{magazine}", [GuestMagazineController::class, "downloadMag"])->name("magazine-download");

    Route::get("contacts", [MainController::class, "contact"])->name("contact");

    Route::post('contact', [ContactController::class, "send"])->name('contact:send');

    Route::get("download-file/{quotation}", [AboutController::class, "downloadFile"])->name("downloadFile");



    Route::prefix("mediatheque/")->as("decentralisation:")->group(function () {

        Route::get("lois", [DecentralisationController::class, "lois"])->name("lois");

        Route::get("informations", [DecentralisationController::class, "informations"])->name("informations");
    });

    Route::prefix("projets/")->as("projets:")->group(function () {

        Route::get("plaidoyers", [GuestProjectController::class, "plaidoyers"])->name("plaidoyers");

        Route::get("en-cours", [GuestProjectController::class, "projetsEnCours"])->name("projetsEnCours");

        Route::get("realises", [GuestProjectController::class, "projetsRealises"])->name("projetsRealises");

        Route::get("download-file/{project}", [GuestProjectController::class, "downloadFile"])->name("downloadFile");
    });

    Route::prefix("mediatheque/")->as("mediatheque:")->group(function () {

        Route::get("centre-national-ressources", [MediathequeController::class, "ressources"])->name("ressources");

        Route::get("rapports-ag", [MediathequeController::class, "rapportsAG"])->name("rapportsAG");

        Route::get("rapports-annuels", [MediathequeController::class, "rapportsAnnuels"])->name("rapportsAnnuels");

        Route::get("download-file/{rapport}", [MediathequeController::class, "downloadFile"])->name("downloadFile");
    });

    Route::prefix("localisation/{region}")->as("carte:")->group(function () {
        Route::get('', [MapLocalisationController::class, 'index'])->name('index');
    });

    Route::prefix("evenement/{eventType}")->as("events:")->group(function () {
        Route::get("", [GuestEventController::class, "index"])->name("index");

        Route::get("{event}", [GuestEventController::class, "show"])->name("show");
    });

    Route::prefix("actualites/")->as("actualites:")->group(function () {

        Route::get("", [GuestActualiteController::class, "index"])->name("index");

        Route::get("{actualite}", [GuestActualiteController::class, "show"])->name("show");
    });

    Route::prefix("thematiques/")->as("thematiques:")->group(function () {

        Route::get("", [GuestThematiqueController::class, "index"])->name("index");

        Route::get("{thematique}", [GuestThematiqueController::class, "show"])->name("show");
    });

    Route::get("actu-videos", [GuestActuVideoController::class, "index"])->name("actuvideos:index");

    Route::post("store-newsletter-contact", [NewsletterContactController::class, "storeContactMail"])->name("newsletter:storeContactMail");
});

// Auth's routes
Route::middleware("check.auth.user")->prefix("auth/")->as("auth:")->group(function () {

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

    Route::prefix("actu-videos/")->as("actuVideo:")->group(function () {

        Route::get("", [ActuVideoController::class, "index"])->name("index");

        Route::post("store", [ActuVideoController::class, "store"])->name("store");

        Route::patch("{actuVideo}/update", [ActuVideoController::class, "update"])->name("update");

        Route::delete("{actuVideo}/destroy", [ActuVideoController::class, "destroy"])->name("destroy");
    });

    Route::prefix("twitter-posts/")->as("twitter:")->group(function () {
        Route::get("", [TwitterPostController::class, "index"])->name("index");

        Route::post("store-processing", [TwitterPostController::class, "store"])->name("store");

        Route::patch("{twitterPost}/update-processing", [TwitterPostController::class, "update"])->name("update");

        Route::delete("{twitterPost}/destroy", [TwitterPostController::class, "destroy"])->name("destroy");
    });

    Route::prefix("evenements/")->as("evenements:")->group(function () {

        Route::get("", [EventController::class, "index"])->name("index");

        Route::get("ajout-nouveau", [EventController::class, "create"])->name("create");

        Route::post("store", [EventController::class, "store"])->name("store");

        Route::get("{event}/details", [EventController::class, "show"])->name("show");

        Route::patch("{event}/update", [EventController::class, "update"])->name("update");

        Route::delete("{event}/destroy", [EventController::class, "destroy"])->name("destroy");
    });

    Route::prefix("rapports-ag/")->as("rapports-ag:")->group(function () {
        Route::get("", [RapportController::class, "index"])->name("index");

        Route::post("store", [RapportController::class, "store"])->name("store");

        Route::patch("{rapport}/update", [RapportController::class, "update"])->name("update");

        Route::delete("{rapport}/destroy", [RapportController::class, "destroy"])->name("destroy");
    });

    Route::prefix("rapports-activites/")->as("rapports-activites:")->group(function () {
        Route::get("", [ActiviteAnnuelleController::class, "index"])->name("index");

        Route::post("store", [ActiviteAnnuelleController::class, "store"])->name("store");

        Route::patch("{rapport}/update", [ActiviteAnnuelleController::class, "update"])->name("update");

        Route::delete("{rapport}/destroy", [ActiviteAnnuelleController::class, "destroy"])->name("destroy");
    });

    Route::prefix("magazines/")->as("magazines:")->group(function () {
        Route::get("", [MagazineController::class, "index"])->name("index");

        Route::post("store", [MagazineController::class, "store"])->name("store");

        Route::patch("{magazine}/update", [MagazineController::class, "update"])->name("update");

        Route::delete("{magazine}/destroy", [MagazineController::class, "destroy"])->name("destroy");
    });

    Route::prefix("activites_annuelles/")->as("activites_annuelles:")->group(function () {

        Route::get("", [RapportController::class, "activitesAnnuellesView"])->name("view");

        Route::post("store", [RapportController::class, "activitesAnnuellesStore"])->name("store");

        Route::patch("{activite}/update", [RapportController::class, "activitesAnnuellesUpdate"])->name("update");

        Route::delete("{id}/destroy", [RapportController::class, "rapportDestroy"])->name("destroy");
    });


    Route::prefix("ressources/")->as("ressources:")->group(function () {

        Route::get("", [RapportController::class, "ressourcesView"])->name("view");

        Route::post("store", [RapportController::class, "ressourcesStore"])->name("store");

        Route::patch("{ressource}/update", [RapportController::class, "ressourcesUpdate"])->name("update");

        Route::delete("{id}/destroy", [RapportController::class, "rapportDestroy"])->name("destroy");
    });

    Route::prefix("prefectures/")->as("prefectures:")->group(function () {

        Route::get("", [PrefectureController::class, "index"])->name("index");

        Route::post("store", [PrefectureController::class, "Store"])->name("store");

        Route::patch("{prefecture}/update", [PrefectureController::class, "Update"])->name("update");

        Route::delete("{prefecture}/destroy", [PrefectureController::class, "Destroy"])->name("destroy");
    });

    Route::prefix("communes/")->as("communes:")->group(function () {

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

    Route::prefix("a-propos/{quotationType}/")->as("about:")->group(function () {

        Route::get("", [QuotationController::class, 'index'])->name("index");

        Route::post("store", [QuotationController::class, 'store'])->name("store");
    });

    Route::prefix("decentralisation/{quotationType}/")->as("decentralisation:")->group(function () {

        Route::get("", [QuotationController::class, 'index'])->name("index");

        Route::post("store", [QuotationController::class, 'store'])->name("store");
    });


    Route::prefix("localisation/")->as("maploc:")->group(function () {

        Route::get("", [MapLocationController::class, "index"])->name("index");

        Route::post("store", [MapLocationController::class, "store"])->name("store");

        Route::delete("destroy", [MapLocationController::class, "destroy"])->name("destroy");
    });

    Route::prefix("actualites/")->as("actualites:")->group(function () {

        Route::get("", [ActualiteController::class, "index"])->name("index");

        Route::get("ajout-nouveau", [ActualiteController::class, "create"])->name("create");

        Route::post("store", [ActualiteController::class, "store"])->name("store");

        Route::get("{actualite}/details", [ActualiteController::class, "show"])->name("show");

        Route::patch("{actualite}/update", [ActualiteController::class, "update"])->name("update");

        Route::delete("{actualite}/destroy", [ActualiteController::class, "destroy"])->name("destroy");
    });

    Route::prefix("thematiques/")->as("thematiques:")->group(function () {

        Route::get("", [ThematiqueController::class, "index"])->name("index");

        Route::get("ajout-nouveau", [ThematiqueController::class, "create"])->name("create");

        Route::post("store", [ThematiqueController::class, "store"])->name("store");

        Route::get("{thematique}/details", [ThematiqueController::class, "show"])->name("show");

        Route::patch("{thematique}/update", [ThematiqueController::class, "update"])->name("update");

        Route::delete("{thematique}/destroy", [ThematiqueController::class, "destroy"])->name("destroy");
    });

    Route::prefix("partenaires/")->as("partner:")->group(function () {

        Route::get("", [PartnerController::class, "index"])->name("index");

        Route::post("store", [PartnerController::class, "store"])->name("store");

        Route::patch("{partner}/update", [PartnerController::class, "update"])->name("update");

        Route::delete("{partner}/destroy", [PartnerController::class, "destroy"])->name("destroy");
    });

    Route::prefix("messages")->as("messages:")->group(function () {
        Route::get('', [MessagesController::class, "index"])->name('index');

        Route::get('{contact}/show', [MessagesController::class, "show"])->name('show');
    });

    Route::prefix("publicites/")->as("publicites:")->group(function () {

        Route::get("", [PubliciteController::class, "index"])->name("index");

        Route::post("store", [PubliciteController::class, "store"])->name("store");

        Route::patch("{publicite}/update", [PubliciteController::class, "update"])->name("update");

        Route::delete("{publicite}/destroy", [PubliciteController::class, "destroy"])->name("destroy");
    });

    Route::prefix("annuaires/")->as("annuaires:")->group(function () {


        Route::prefix("files")->group(function () {

            Route::post("{commune}/file-domaine-store", [AnnuaireFileController::class, "domaineStore"])->name("file-domaine-store");

            Route::post("{commune}/file-store", [AnnuaireFileController::class, "store"])->name("file-store");

            Route::post("{commune}/presentation", [AnnuaireFileController::class, "presentation"])->name("file:presentation");

            Route::post("{commune}/partenaires", [AnnuaireFileController::class, "partner"])->name("file:partner");

            Route::patch("{annuaire}/{annuaireFile}/partenaires-update", [AnnuaireFileController::class, "updatePartner"])->name("file:partner:update");

            Route::delete("{annuaireFile}/partenaires-delete", [AnnuaireFileController::class, "deletePartner"])->name("file:partner:delete");
        });

        Route::post("{commune}/store", [AnnuaireController::class, "store"])->name("store");

        Route::get("communes", [CommuneLinkController::class, "index"])->name("communes");

        Route::get("{commune}/details", [CommuneLinkController::class, "show"])->name("show");

        Route::patch("{commune}/update-processing", [CommuneLinkController::class, "update"])->name("update");

        Route::post("{commune}/store-responsable", [AnnuaireResponsableController::class, "createResponsables"])->name("store-responsable");

        Route::delete('{commune}/responsables/{type}/image', [AnnuaireResponsableController::class, 'deleteResponsableImage'])->name("destroy-responsable-image");

        Route::prefix("annonces/")->as("annonces:")->group(function () {

            Route::get("", [AnnonceController::class, "index"])->name("index");

            Route::post("store", [AnnonceController::class, "store"])->name("store");

            Route::patch("{annonce}/update", [AnnonceController::class, "update"])->name("update");

            Route::delete("{annonce}/destroy", [AnnonceController::class, "destroy"])->name("destroy");
        });

        Route::prefix("plaquettes")->as("plaquettes:")->group(function () {
            Route::get('', [PlaquetteController::class, "index"])->name("index");

            Route::get("{commune}/details", [PlaquetteController::class, "show"])->name("show");

            Route::post("{commune}/{atoutNum}/atout-proccessing-data", [AnnuaireAtoutController::class, "store"])->name("atout:store");
        });
    });

    Route::prefix('administrateurs/')->as('users:')->group(function () {
        Route::get('', [UserController::class, "index"])->name('index');

        Route::post('register', [UserController::class, "register"])->name('register');

        Route::post('logout', [UserController::class, "logout"])->name('logout');
    });

    Route::withoutMiddleware("check.auth.user")->group(function () {
        Route::get('login', [UserController::class, "loginView"])->name("login:view");

        Route::post('login', [UserController::class, "login"])->name("login");


        Route::get('/cmpdf/{commue}', function ($commune) {
            $filename = \App\Models\CommuneLink::where("commune_id", $commune)->value("presentation");

            $path = storage_path('app/public/' . $filename);

            if (!file_exists($path)) {
                abort(404);
            }

            return Response::file($path, [
                'Access-Control-Allow-Origin' => 'https://communestogo.sogevo.com',
                'Access-Control-Allow-Methods' => 'GET',
            ]);
        });
    });
});
