@extends('layout')

@section('content')

<div class="flex justify-center mt-24">
    <div class="w-full max-w-md bg-white p-6 rounded shadow-md border">

        <h2 class="text-xl font-bold mb-4 text-center">Edit Employee (ID: {{ $employee->id }})</h2>

        <form method="POST" action="{{ route('employees.update', $employee->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="block font-medium">Name</label>
                <input
                    type="text"
                    name="name"
                    class="border p-2 rounded w-full"
                    placeholder="Enter name"
                    value="{{ old('name', $employee->name) }}"
                >
            </div>

            <div class="mb-3">
                <label class="block font-medium">Email</label>
                <input
                    type="email"
                    name="email"
                    class="border p-2 rounded w-full"
                    placeholder="Enter email"
                    value="{{ old('email', $employee->email) }}"
                >
            </div>

            <div class="mb-3">
                <label class="block font-medium">Message</label>
                <textarea
                    name="message"
                    class="border p-2 rounded w-full"
                    placeholder="Enter message"
                >{{ old('message', $employee->message) }}</textarea>
            </div>

            <div class="flex justify-between items-center mt-4">
                <button
                    type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                >
                    UPDATE
                </button>
                <a href="{{ route('employees.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded text-sm">Cancel</a>
            </div>

        </form>

    </div>
</div>

@endsection