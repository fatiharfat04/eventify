@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="max-w-md mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-6">Login to Eventify</h1>

        @error('email')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <form action="{{ route('login.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label>Email</label>
                <input type="email" name="email" class="w-full border rounded-lg p-2">
            </div>

            <div class="mb-4">
                <label>Password</label>
                <input type="password" name="password" class="w-full border rounded-lg p-2">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded-lg">
                Login
            </button>
        </form>
    </div>
@endsection
