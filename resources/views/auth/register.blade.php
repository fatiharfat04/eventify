@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="max-w-md mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-6">
            Create an Account
        </h1>

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label>Name</label>
                <input type="text" name="name"
                    class="w-full border rounded-lg p-2">
            </div>

            <div class="mb-4">
                <label>Email</label>
                <input type="email" name="email"
                    class="w-full border rounded-lg p-2">
            </div>

            <div class="mb-4">
                <label>Password</label>
                <input type="password" name="password"
                    class="w-full border rounded-lg p-2">
            </div>

            <div class="mb-4">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation"
                    class="w-full border rounded-lg p-2">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white p-2 rounded-lg">
                Register
            </button>
        </form>
    </div>
@endsection