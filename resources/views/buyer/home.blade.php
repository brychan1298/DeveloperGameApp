@extends('buyer.master')
@section('content')
    <div class="container mx-auto">

        <div class="row mx-12">
            <div class="my-5">
                <a href="/buyer/buy-game" class="button bg-green-600 text-white px-4 py-3">
                    + Buy More Game
                </a>
            </div>
            <div class="flex justify-between">
                <h1 class="text-2xl">
                    Game's Library
                </h1>
                <div>
                    <h1 class="text-md">
                        Your Wallet : {{ auth()->user()->wallet }}
                    </h1>
                    <button data-modal-target="staticModal" data-modal-toggle="staticModal"
                        class="button bg-red-500 px-5 py-3">
                        Top Up
                    </button>

                    <!-- Main modal -->
                    <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <form action="/buyer/top-up" method="post">
                            @csrf
                            @method('put')
                            <div class="relative w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Static modal
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="staticModal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">
                                        <div class="border-2 h-10 w-full relative bg-transparent">
                                            <input type="number" id="Qty" value="0"
                                                class="Qty text-center text-center w-full text-md " name="wallet">
                                            <div id="addButton" onclick="addAmount()"
                                                class="bg-[#850000] text-white h-full w-20 cursor-pointer">
                                                <span class="m-auto text-2xl font-thin">+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-6 border-gray-200">
                                        <button type="submit" class=" px-5 py-3 text-white bg-blue-700">
                                            Top Up
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="flex justify-center grid grid-cols-4">
                @foreach ($games as $game)
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow my-5">
                        <img class="rounded-t-lg" src="{{ asset('storage/' . $game->Game->image) }}" alt="" />
                        <div class="p-5">
                            <h1 class="text-2xl">
                                {{ $game->Game->name }}
                            </h1>
                            <div class="flex justify-between">
                                <p class="mb-3 font-normal">
                                    {{ $game->Game->description }}
                                </p>
                            </div>

                            <div class="flex justify-around">
                                <h2></h2>
                                <h2></h2>
                                <button type="submit"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg">
                                    Install & Play
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        function addAmount() {
            var amount = document.getElementById('Qty');
            amount.value = parseInt(amount.value) + 100;
        };
    </script>
@endsection
