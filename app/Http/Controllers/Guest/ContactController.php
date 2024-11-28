<?php

namespace App\Http\Controllers\Guest;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function send(ContactRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        Contact::create($fields);

        return redirect()->back()->with('success', 'Votre message a bien été envoyé');
    }
}
