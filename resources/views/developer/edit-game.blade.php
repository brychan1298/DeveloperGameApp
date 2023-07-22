@extends('developer.master')
@section('content')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <div class="container mx-auto mt-10">
        <form action="/developer/update-game" method="POST" enctype="multipart/form-data" class="mx-10">
            @csrf
            @method('put')
            <input type="hidden" name="game_id" value="{{$game->id}}">

            <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="name"
                value="{{ old('name', $game->name) }}" required />

            <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="description" required
                value="{{ old('description', $game->description) }}" />

            <input type="number" class="block border border-grey-light w-full p-3 rounded mb-4" name="price" required
                value="{{ old('price', $game->price) }}" />

            <input
                class="block my-4 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                id="image" type="file" name="image" onchange="previewImage()">
            <input type="hidden" id="image" name="oldImage" value="{{ $game->image }}">
            <img src="{{ asset('storage/' . $game->image) }}" alt=""
                class="img-preview img-fluid mb-3 col-sm-5 d-block w-[30vw]">

            <button type="submit" class="w-full text-center bg-green-400 py-3 rounded-md text-white hover:bg-blue-400">
                Update Game
            </button>
        </form>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvenet) {
                imgPreview.src = oFREvenet.target.result;
            }
        }
    </script>
@endsection
