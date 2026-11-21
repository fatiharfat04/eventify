@extends('layouts.app')

@section('title', 'Create Event')

@section('content')
    <div class="max-w-2xl mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold mb-6">Create New Event</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.store') }}" method="POST" class="space-y-5">

            @csrf

            <div>
                <label class="block font-medium mb-2">Event Title</label>
                <input type="text" name="title" class="w-full border rounded-lg p-3"
                    placeholder="Contoh: Laravel Bootcamp">
            </div>

            <div>
                <label class="block font-medium mb-2">Category</label>
                <select name="category_id" class="w-full border rounded-lg p-3">
                    <option value="">Pilih kategori</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div>
                <label class="block font-medium mb-2">Description</label>
                <textarea name="description" class="w-full border rounded-lg p-3" rows="4"></textarea>
            </div>

            <div>
                <label class="block font-medium mb-2">Location</label>
                <input type="text" name="location" class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="block font-medium mb-2">Start Date</label>
                <input type="datetime-local" name="start_at" class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="block font-medium mb-2">End Date</label>
                <input type="datetime-local" name="end_at" class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="block font-medium mb-2">
                    Registration Start
                </label>
                <input type="datetime-local" name="registration_start_at" class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="block font-medium mb-2">
                    Registration End
                </label>
                <input type="datetime-local" name="registration_end_at" class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="block font-medium mb-2">Capacity</label>
                <input type="number" name="capacity" min="1" class="w-full border rounded-lg p-3">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg
                   hover:bg-blue-700">
                Create Event
            </button>
        </form>
    </div>
@endsection
