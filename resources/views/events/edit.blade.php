
@extends('layouts.app')

@section('title', 'Edit Event')

@section('content')
<div class="max-w-2xl mx-auto py-8 px-4">

    <h1 class="text-3xl font-bold mb-6">Edit Event</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.update', $event->slug) }}"
          method="POST"
          class="space-y-5">

        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium mb-2">Event Title</label>

            <input type="text" name="title"
                value="{{ old('title', $event->title) }}"
                class="w-full border rounded-lg p-3">
        </div>

        <div>
            <label class="block font-medium mb-2">Category</label>

            <select name="category_id"
                class="w-full border rounded-lg p-3">

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $event->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>
        </div>

        <div>
            <label class="block font-medium mb-2">Description</label>

            <textarea name="description"
                rows="4"
                class="w-full border rounded-lg p-3">{{ old('description', $event->description) }}</textarea>
        </div>

        <div>
            <label class="block font-medium mb-2">Location</label>

            <input type="text" name="location"
                value="{{ old('location', $event->location) }}"
                class="w-full border rounded-lg p-3">
        </div>

        <div>
            <label class="block font-medium mb-2">Start Date</label>

            <input type="datetime-local" name="start_at"
                value="{{ old('start_at', \Carbon\Carbon::parse($event->start_at)->format('Y-m-d\TH:i')) }}"
                class="w-full border rounded-lg p-3">
        </div>

        <div>
            <label class="block font-medium mb-2">End Date</label>

            <input type="datetime-local" name="end_at"
                value="{{ old('end_at', \Carbon\Carbon::parse($event->end_at)->format('Y-m-d\TH:i')) }}"
                class="w-full border rounded-lg p-3">
        </div>

        <div>
            <label class="block font-medium mb-2">Registration Start</label>

            <input type="datetime-local" name="registration_start_at"
                value="{{ old('registration_start_at', \Carbon\Carbon::parse($event->registration_start_at)->format('Y-m-d\TH:i')) }}"
                class="w-full border rounded-lg p-3">
        </div>

        <div>
            <label class="block font-medium mb-2">Registration End</label>

            <input type="datetime-local" name="registration_end_at"
                value="{{ old('registration_end_at', \Carbon\Carbon::parse($event->registration_end_at)->format('Y-m-d\TH:i')) }}"
                class="w-full border rounded-lg p-3">
        </div>

        <div>
            <label class="block font-medium mb-2">Capacity</label>

            <input type="number" name="capacity" min="1"
                value="{{ old('capacity', $event->capacity) }}"
                class="w-full border rounded-lg p-3">
        </div>

        <div class="flex gap-3">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">
                Update Event
            </button>

            <a href="{{ route('events.index') }}"
                class="border px-6 py-3 rounded-lg">
                Cancel
            </a>
        </div>

    </form>
</div>
@endsection