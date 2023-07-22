@extends('buyer.master')
@section('content')
    <div class="container mx-auto mt-10">
        <div class="row mt-10">
            <h1 class="text-2xl text-center">
                Our Recomended Product
            </h1>
            @if (Session()->has("error"))
            <h1 class="text-center text-xl text-red-700">
                {{Session()->get("error")}}
            </h1>

            @endif
            <div class="grid grid-cols-3">
                @foreach ($games as $game)
                    <form action="/buyer/buy-game" method="post" onsubmit="return validateWallet({{$game->price}}, {{auth()->user()->wallet}})">
                        @csrf
                        <input type="hidden" value="{{ $game->id }}" name="game_id">
                        <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                        <input type="hidden" value="{{ $game->price }}" name="price">
                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow my-5">
                            <img class="rounded-t-lg" src="{{ asset('storage/' . $game->image) }}" alt="" />
                            <div class="p-5">
                                <h1 class="text-2xl">
                                    {{ $game->name }}
                                </h1>
                                <h2 class="text-md font-bold">
                                    Developer : {{$game->User->name}}
                                </h2>
                                <div class="flex justify-between">
                                    <p class="mb-3 font-normal">
                                        {{ $game->description }}
                                    </p>
                                    <p>
                                        Rp. {{ $game->price }}, 00
                                    </p>
                                </div>

                                <div class="flex justify-around">
                                    <h2></h2>
                                    <h2></h2>
                                    <button type="submit"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg">
                                        Buy
                                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function validateWallet(price, wallet){
            if(wallet < price){
                alert("Your wallet gak cukup!");
                return false;
            }
            return true;
        }
    </script>
@endsection
