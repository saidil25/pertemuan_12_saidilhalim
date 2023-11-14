@extends('auth.layouts')

@section('content')
<div class="flex justify-center mt-5">
    <div class="w-1/2 bg-white p-4 rounded-lg shadow-lg">
        <div class="font-semibold text-2xl mb-4">Edit Gambar</div>
        <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" class="form-input w-full @error('title') border-red-500 @enderror" id="title" name="title" value="{{ $gallery->title }}">
                @error('title')
                <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea class="form-input w-full @error('description') border-red-500 @enderror" id="description" rows="5" name="description">{{ $gallery->description }}</textarea>
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
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
