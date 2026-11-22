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
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 flex flex-col h-full">

                <div>
                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                        {{ $event->category->name }}
                    </span>

                    <h2 class="text-xl font-bold mt-4">
                        {{ $event->title }}
                    </h2>

                    <div class="mt-4 space-y-3 text-gray-600">
                        <p>📍 {{ $event->location }}</p>

                        <p>
                            📅 {{ \Carbon\Carbon::parse($event->start_at)->format('d M Y, H:i') }}
                        </p>

                        <p>👥 Capacity: {{ $event->capacity }} participants</p>
                    </div>
                </div>

                <a href="{{ route('events.show', $event->slug) }}"
                    class="mt-6 block w-full text-center bg-blue-600
              hover:bg-blue-700 text-white font-semibold
              py-3 rounded-lg transition">
                    Lihat Detail
                </a>

            </div>

        @empty

            <p class="text-gray-500">
                Belum ada event tersedia.
            </p>
        @endforelse

    </div>

@endsection
