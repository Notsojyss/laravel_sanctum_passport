<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    public function createEvent(Request $request)
    {
        $request->validate([
            'Title' => 'required|string|max:255',
            'Content' => 'required|string',
            'Location' => 'required|string',
            'StartTime' => 'required|date',
            'EndTime' => 'required|date|after:StartTime',
            'image_path' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'key_people' => 'nullable|array',
            'key_people.*.name' => 'nullable|string|max:255',
            'key_people.*.role' => 'nullable|string|max:255',
        ]);

        // Store uploaded image
        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('events', 'public');
        }

        // Create event record
        $event = Event::create([
            'Title' => $request->Title,
            'Content' => $request->Content,
            'Location' => $request->Location,
            'StartTime' => $request->StartTime,
            'EndTime' => $request->EndTime,
            'key_people' => $request->input('key_people'), // will be auto-cast to JSON
            'image_path' => $imagePath,

        ]);

        return response()->json(['message' => 'Event created successfully', 'event' => $event]);
    }

    public function fetchEvents(){

        $events = Event::all();
        return view('event', compact('events'));
    }
}
