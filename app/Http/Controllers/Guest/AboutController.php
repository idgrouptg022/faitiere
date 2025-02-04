<?php

namespace App\Http\Controllers\Guest;

use Exception;
use App\Models\Content;
use App\Models\Partner;
use App\Enums\WordTypes;
use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Enums\QuotationTypes;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function historique(): View
    {
        $quotation = Quotation::where("type", QuotationTypes::Historique)->first();

        $quotationFile = $quotation != null && $quotation->files != null ? $quotation->files()->first() : null;

        return view("guests.historique", compact("quotation", "quotationFile"));
    }

    public function presentation(): View
    {
        $presentation = Content::where(
            "type", WordTypes::Presentation
        )->first();

        return view("guests.presentation", compact("presentation"));
    }

    public function role_mission(): View
    {
        $quotation = Quotation::where("type", QuotationTypes::RoleMission)->first();

        $quotationFile = $quotation != null && $quotation->files != null ? $quotation->files()->first() : null;

        return view("guests.role", compact("quotation", "quotationFile"));
    }

    public function statut(): View
    {
        $statut = Quotation::where("type", QuotationTypes::Statut)->first();

        $statutFile = $statut != null && $statut->files != null ? $statut->files()->first() : null;

        $reglement = Quotation::where("type", QuotationTypes::Reglement)->first();

        $reglementFile = $reglement != null && $reglement->files != null ? $reglement->files()->first() : null;

        return view("guests.statut", compact("statut", "statutFile", "reglement", "reglementFile"));
    }

    public function organigramme(): View
    {
        $quotation = Quotation::where("type", QuotationTypes::Organigramme)->first();

        $quotationFile = $quotation != null && $quotation->files != null ? $quotation->files()->first() : null;

        return view("guests.organigramme", compact("quotation", "quotationFile"));
    }

    public function partner(): View
    {
        $partners = Partner::all();
        return view("guests.partenaires", compact("partners"));
    }

    public function presidentWord(): View
    {
        $content = Content::where("type", WordTypes::PresidentWord)->first();

        return view("guests.president-word", compact("content"));
    }

    public function downloadFile(Quotation $quotation)
    {
        try {
            return response()->download('storage/'. $quotation->files->first()->filepath, $quotation->type);
        } catch (Exception $e) {
            abort(500);
        }
    }
}
