@extends('auth.layouts')

@section('content')
<div class="flex justify-center mt-5">
    <div class="w-1/2 bg-white p-4 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">Register</h1>
        <form action="{{ route('store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" class="form-input @error('name') border-red-500 @enderror" id="name" name="name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="text-red-500 text-xs">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                <input type="email" class="form-input @error('email') border-red-500 @enderror" id="email" name="email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="text-red-500 text-xs">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" class="form-input @error('password') border-red-500 @enderror" id="password" name="password">
                @if ($errors->has('password'))
                    <span class="text-red-500 text-xs">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
                <input type="password" class="form-input" id="password_confirmation" name="password_confirmation">
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection
