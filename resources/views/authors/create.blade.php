@extends('layouts.app')

@section('content')
    <div class="w-2/3 bg-gray-200 mx-auto p-6 shadow">
        <form action="/authors" method="POST" class="flex flex-col items-center">
            @csrf
            <h1>Add New Author</h1>
            <div class="pt-4">
                <input type="text" name="name" class="rounded py-2 px-4 w-64" placeholder="Full Name">
                @error('name')<p class="text-red-600">{{ $message }}</p>@enderror
            </div>
            <div class="pt-4">
                <input type="text" name="dob" class="rounded py-2 px-4 w-64" placeholder="Date of Birth">
                @error('dob')<p class="text-red-600">{{ $message }}</p>@enderror
            </div>
            <div class="pt-4">
                <button class="bg-blue-400 text-white rounded py-2 px-4">Add Author</button>
            </div>
        </form>
    </div>
@endsection