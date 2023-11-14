@extends('auth.layouts')

@section('content')

<form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="w-1/2 mx-auto bg-white p-4 rounded-lg shadow-lg mt-5">
    @csrf
    <div class="mb-4">
        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
        <input type="text" class="form-input w-full @error('title') border-red-500 @enderror" id="title" name="title" placeholder="Enter Title">
        @error('title')
        <p class="text-red-500 text-xs">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
        <textarea class="form-textarea w-full h-24 @error('description') border-red-500 @enderror" id="description" name="description" placeholder="Enter Description"></textarea>
        @error('description')
        <p class="text-red-500 text-xs">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="input-file" class="block text-gray-700 text-sm font-bold mb-2">File input</label>
        <div class="relative">
            <input type="file" class="form-input hidden" id="input-file" name="picture">
            <label for="input-file" class="cursor-pointer bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700">Choose file</label>
        </div>
    </div>
    <div class="mb-4">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Submit</button>
    </div>
</form>

@endsection