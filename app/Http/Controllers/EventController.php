<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('category')->latest()->get();

        return view('events.index', compact('events'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('events.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'registration_start_at' => 'required|date',
            'registration_end_at' => 'required|date|after:registration_start_at|before_or_equal:start_at',
            'capacity' => 'required|integer|min:1',
        ]);

        Event::create([
            'category_id' => $validated['category_id'],
            'organizer_id' => 1, // Sementara untuk latihan
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'description' => $validated['description'],
            'location' => $validated['location'],
            'start_at' => $validated['start_at'],
            'end_at' => $validated['end_at'],
            'registration_start_at' => $validated['registration_start_at'],
            'registration_end_at' => $validated['registration_end_at'],
            'capacity' => $validated['capacity'],
            'status' => 'draft',
        ]);

        return redirect()
            ->route('events.index')
            ->with('success', 'Event berhasil dibuat!');
    }


    public function show(Event $event)
    {
        $event->load('category', 'organizer');

        return view('events.show', compact('event'));
    }


    public function edit(Event $event)
    {
        $categories = Category::all();

        return view('events.edit', compact('event', 'categories'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'registration_start_at' => 'required|date',
            'registration_end_at' => 'required|date|after:registration_start_at|before_or_equal:start_at',
            'capacity' => 'required|integer|min:1',
        ]);

        $event->update($validated);

        return redirect()
            ->route('events.show', $event->slug)
            ->with('success', 'Event berhasil diperbarui!');
    }


    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event berhasil dihapus!');
    }
}
