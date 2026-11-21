
@extends('layouts.app')

@section('title', 'Events')



@section('content')

@if (session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4">
        {{ session('success') }}
    </div>
@endif

    <div class="mb-10">
        <h1 class="text-3xl font-bold text-gray-900">
            Explore Events
        </h1>

        <p class="text-gray-500 mt-2">
            Temukan event menarik dan kembangkan kemampuanmu.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse ($events as $event)

            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-lg transition">

                <span class="inline-block bg-blue-100 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">
                    {{ $event->category->name }}
                </span>

                <h2 class="text-xl font-bold text-gray-900 mt-4">
                    {{ $event->title }}
                </h2>

                <div class="mt-4 space-y-2 text-sm text-gray-500">
                    <p>📍 {{ $event->location }}</p>
                    <p>📅 {{ \Carbon\Carbon::parse($event->start_at)->format('d M Y, H:i') }}</p>
                    <p>👥 Capacity: {{ $event->capacity }} participants</p>
                </div>

                <button class="w-full mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition" href="#">
                    Lihat Detail
                </button>

            </div>

        @empty

            <p class="text-gray-500">
                Belum ada event tersedia.
            </p>

        @endforelse

    </div>

@endsection

