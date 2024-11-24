<?php

namespace App\Http\Controllers\Auth;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(): View
    {
        $events = Event::latest()->get();

        return view("auths.events.index", compact('events'));
    }

    public function create(): View
    {
        return view("auths.events.create");
    }

    public function store(EventRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        $imagePath = null;

        if ($request->hasFile("image")) {
            $imagePath = $request->image->store("events", "public");
        }

        $fields["image"] = $imagePath;

        Event::create($fields);

        return redirect()->route("auth:evenements:index")->with("success", "L'événement a été crée avec succès");
    }

    public function show(Event $event): View|RedirectResponse
    {
        $findEvent = Event::where("id", $event->id)->doesntExist();

        if ($findEvent) {
            return redirect()->route("auth:evenements:index")->with("error", "L'événement n'existe pas");
        }

        return view("auths.events.show", compact('event'));
    }

    public function update(EventRequest $request, Event $event): RedirectResponse
    {
        $fields = $request->validated();

        $imagePath = null;

        if ($request->hasFile("image")) {

            $oldFile = $event->image;

            $imagePath = $request->image->store("events", "public");

            $fields["image"] = $imagePath;

            if (Storage::disk("public")->exists($oldFile)) {
                Storage::disk("public")->delete($oldFile);
            }
        }

        $event->update($fields);

        return redirect()->route("auth:evenements:index")->with("success", "L'événement a été mis à jour avec succès");
    }
}
