<?php

namespace App\Http\Controllers\Guest;

use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Enums\QuotationTypes;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class DecentralisationController extends Controller
{
    public function lois(): View
    {
        $quotation = Quotation::where("type", QuotationTypes::DecentralisationLois)->first();

        $quotationFile = $quotation != null && $quotation->files != null ? $quotation->files()->first() : null;

        return view("guests.decentralisation.lois", compact("quotation", "quotationFile"));
    }

    public function informations(): View
    {
        $quotation = Quotation::where("type", QuotationTypes::DecentralisationInfo)->first();

        $quotationFile = $quotation != null && $quotation->files != null ? $quotation->files()->first() : null;

        return view("guests.decentralisation.informations", compact("quotation", "quotationFile"));
    }
}
