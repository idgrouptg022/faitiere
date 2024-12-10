<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Models\NewsletterContact;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Event;
use App\Events\NewsletterRegisteredEvent;

class NewsletterContactController extends Controller
{
    public function storeContactMail(Request $request): RedirectResponse
    {
        $request->validate([
            "newsletter-email" => "required|email|unique:newsletter_contacts,email"
        ], [
            "newsletter-email.required" => "Votre adresse mail est requise",
            "newsletter-email.email" => "Votre adresse mail est invalide",
            "newsletter-email.unique" => "Cette adresse mail est déjà enregistrée"
        ]);

        $newsletter = NewsletterContact::create([
            "email" => $request->input("newsletter-email")
        ]);

        Event::dispatch(new NewsletterRegisteredEvent($newsletter->email));

        return redirect()->back()->with("newsletter-success", "Merci de vous être inscrit à notre newsletter!");
    }
}
