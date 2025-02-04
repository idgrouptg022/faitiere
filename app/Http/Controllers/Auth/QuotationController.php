<?php

namespace App\Http\Controllers\Auth;

use App\Enums\QuotationTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuotationRequest;
use App\Models\Quotation;
use App\Models\QuotationFile;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index(string $quotationType): View
    {
        if (!in_array($quotationType, array_map(fn($case) => $case->value, QuotationTypes::cases()))) {
            abort(404);
        }
        $quotationTypeCase = QuotationTypes::from($quotationType);
        $quotationTypeValue = $quotationTypeCase->value;

        $quotation = Quotation::where("type", $quotationTypeValue)->first();

        $quotationFiles = $quotation != null && $quotation->files != null ? $quotation->files()->first() : null;

        return view("auths.quotation." . $quotationTypeValue, compact("quotation", "quotationFiles"));

    }

    public function store(QuotationRequest $request, string $quotationType): RedirectResponse
    {
        if (!in_array($quotationType, array_map(fn($case) => $case->value, QuotationTypes::cases()))) {
            abort(404);
        }
        $quotationTypeCase = QuotationTypes::from($quotationType);
        $quotationTypeValue = $quotationTypeCase->value;

        $fields = $request->validated();

        unset($fields["filepath"]);

        $fields["type"] = $quotationTypeValue;

        if (!in_array("show_file", $fields)) {
            $fields["show_file"] = false;
        }

        $quotation = Quotation::updateOrCreate(
            ["type" => $quotationTypeValue],
            $fields
        );

        if ($request->hasFile("filepath")) {
            $filePath = $request->file('filepath')->store('quotations/' , 'public');
            QuotationFile::updateOrCreate(
                ["quotation_id" => $quotation->id],
                ["filepath" => $filePath]
            );
        }

        return redirect()->back()->with('success', 'Opération effectuée avec succès');
    }
}
