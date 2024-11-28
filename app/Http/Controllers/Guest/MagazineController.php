<?php

namespace App\Http\Controllers\Guest;

use Exception;
use App\Models\Magazine;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class MagazineController extends Controller
{
    public function index(): View
    {
        $magazines = Magazine::latest()->get();
        return view("guests.magazine", compact("magazines"));
    }

    public function downloadMag(Magazine $magazine)
    {
        try {
            return response()->download('storage/'. $magazine->filepath);
        } catch (Exception $e) {
            abort(500);
        }
    }
}
