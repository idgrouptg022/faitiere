<?php

namespace App\Http\Controllers\Guest;

use App\Models\Event;
use App\Enums\EventTypes;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index(string $eventType): View
    {
        if (!in_array($eventType, array_map( fn($case) => $case->value, EventTypes::cases()))) {
            abort(404);
        }

        $eventTypeCase = EventTypes::from($eventType);
        $eventTypeValue = $eventTypeCase->value;

        $events = Event::where("event_area", $eventTypeValue)->latest()->get();

        return view("guests.events.index", compact("events", "eventTypeValue"));
    }

    public function show(string $eventType, Event $event): View
    {
        if (!in_array($eventType, array_map( fn($case) => $case->value, EventTypes::cases()))) {
            abort(404);
        }

        if (!$event instanceof Event) {
            abort(404);
        }

        $eventTypeCase = EventTypes::from($eventType);
        $eventTypeValue = $eventTypeCase->value;

        $events = Event::where([
            ["event_area", $eventTypeValue],
            ["id", "!=", $event->id],
        ])->latest()->take(3)->get();

        return view("guests.events.show", compact("event", "eventTypeValue", "events"));
    }
}
