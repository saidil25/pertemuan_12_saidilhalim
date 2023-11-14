@extends('auth.layouts')

@section('content')
<div class="flex justify-center mt-5">
    <div class="w-1/2 bg-white p-4 rounded-lg shadow-lg">
        <div class="font-semibold text-2xl mb-4">Gallery</div>
        <div class="grid grid-cols-4 gap-4">
            @if(count($galleries) > 0)
                @foreach ($galleries as $gallery)
                    <div class="col-span-1">
                        <a class="example-image-link" href="{{ asset('storage/posts_image/' . $gallery->picture) }}" data-lightbox="roadtrip" data-title="{{ $gallery->description }}">
                            <img class="example-image mb-2 rounded" src="{{ asset('storage/posts_image/' . $gallery->picture) }}" alt="image-1" />
                        </a>
                        <div class="mt-2 flex justify-center space-x-2">
                            <a href="{{ route('gallery.edit', $gallery->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-3 py-1 rounded-lg">
                                Edit
                            </a>
                            <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold px-3 py-1 rounded-lg" onclick="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-span-4 text-center">
                    <h3 class="text-xl font-semibold">Tidak ada data.</h3>
                </div>
            @endif
        </div>
        <div class="mt-4">
            {{ $galleries->links() }}
        </div>
    </div>
    <script src="{{ asset('lightbox2-dev/dist/js/lightbox-plus-jquery.min.js') }}"></script>
</div>
@endsection
