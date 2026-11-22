@extends('layouts.app')

@section('title', $event->title)

@section('content')
    <div class="max-w-4xl mx-auto py-8 px-4">

        <h1 class="text-3xl font-bold mb-4">
            {{ $event->title }}
        </h1>

        <p class="text-blue-600 mb-4">
            {{ $event->category->name }}
        </p>

        <div class="space-y-3">
            <p>
                <strong>Location:</strong>
                {{ $event->location }}
            </p>

            <p>
                <strong>Organizer:</strong>
                {{ $event->organizer->name }}
            </p>

            <p>
                <strong>Start:</strong>
                {{ \Carbon\Carbon::parse($event->start_at)->format('d M Y, H:i') }}
            </p>

            <p>
                <strong>End:</strong>
                {{ \Carbon\Carbon::parse($event->end_at)->format('d M Y, H:i') }}
            </p>

            <p>
                <strong>Capacity:</strong>
                {{ $event->capacity }} participants
            </p>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold mb-2">Description</h2>

            <p>{{ $event->description }}</p>
        </div>

        <form action="{{ route('events.destroy', $event->slug) }}" method="POST" class="mt-5">

            @csrf
            @method('DELETE')

            <button type="submit" onclick="return confirm('Yakin ingin menghapus event ini?')"
                class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg">
                Delete Event
            </button>
        </form>

    </div>
@endsection
