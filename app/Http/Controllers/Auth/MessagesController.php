<?php

namespace App\Http\Controllers\Auth;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{
    public function index(): View
    {
        $messages = Contact::orderBy("is_viewed")->orderByDesc("created_at")->get();
        return view('auths.messages', compact("messages"));
    }

    public function show(Contact $contact)
    {
        $contact->is_viewed = true;

        $contact->save();

        return response()->json([
            "message" => $contact->body
        ]);
    }
}
