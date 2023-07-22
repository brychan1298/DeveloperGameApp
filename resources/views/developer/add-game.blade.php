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
        <form action="/developer/add-game" method="POST" enctype="multipart/form-data" class="mx-10">
            @csrf
            <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="name"
                placeholder="{{__('form.name')}}" required />
            @error('name')
                <h1 class="text-red-600 text-xl">
                    {{ $message }}
                </h1>
            @enderror

            <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="description"
                placeholder="{{__('form.description')}}" required />

            @error('description')
                <h1 class="text-red-600 text-xl">
                    {{ $message }}
                </h1>
            @enderror

            <input type="number" class="block border border-grey-light w-full p-3 rounded mb-4" name="price"
                placeholder="{{__('form.price')}}" required />

            @error('price')
                <h1 class="text-red-600 text-xl">
                    {{ $message }}
                </h1>
            @enderror

            <input
                class="block my-4 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                id="image" type="file" name="image">

            @error('image')
                <h1 class="text-red-600 text-xl">
                    {{ $message }}
                </h1>
            @enderror

            <button type="submit" class="w-full text-center bg-green-400 py-3 rounded-md text-white hover:bg-blue-400">
                {{__('form.submit')}}
            </button>
        </form>
    </div>
@endsection
