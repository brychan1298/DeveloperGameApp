@extends('developer.master')
@section('content')
    <div class="container mx-auto mt-10">
        <div class="">
            <a href="/developer/add-game" class="button bg-green-600 text-white px-4 py-3">
                + Release More Game
            </a>
        </div>

        @if (Session()->has('updateSuccess'))
            <h1 class="text-green-500 text-xl text-center">
                {{Session()->get('updateSuccess')}}
            </h1>
        @endif

        <div class="row mt-10">
            <div class="grid grid-cols-3">
                @foreach ($games as $game)
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow my-5">
                        <a href="#">
                            <img class="rounded-t-lg" src="{{ asset('storage/'.$game->image)}}" alt="" />
                        </a>
                        <div class="p-5">
                            <h1 class="text-2xl">
                                {{$game->name}}
                            </h1>
                            <div class="flex justify-between">
                                <p class="mb-3 font-normal">
                                    {{$game->description}}
                                </p>
                                <p>
                                    Rp. {{$game->price}}, 00
                                </p>
                            </div>

                            <a href="/developer/edit-game/{{$game->id}}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Edit Game
                                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
