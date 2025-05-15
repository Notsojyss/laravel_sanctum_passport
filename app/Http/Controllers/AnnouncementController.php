<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Event;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function createAnnouncement(Request $request)
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
            $imagePath = $request->file('image_path')->store('announcement', 'public');
        }

        // Create event record
        $announcement = Announcement::create([
            'Title' => $request->Title,
            'Content' => $request->Content,
            'Location' => $request->Location,
            'StartTime' => $request->StartTime,
            'EndTime' => $request->EndTime,
            'key_people' => $request->input('key_people'), // will be auto-cast to JSON
            'image_path' => $imagePath,

        ]);

        return response()->json(['message' => 'Announcement created successfully', 'announcement' => $announcement]);
    }

    public function fetchAnnouncements(){

        return Announcement::all();

    }
}
