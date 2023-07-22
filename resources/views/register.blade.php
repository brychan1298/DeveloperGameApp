@extends('layout.master')
@section('content')
    <!-- component -->
    <div class="bg-grey-lighter min-h-screen flex flex-col">
        <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
            <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                <h1 class="mb-8 text-3xl text-center">Sign up</h1>
                <form action="/register" method="POST">
                    @csrf
                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="name"
                        placeholder="Full Name" required />

                    <input type="email" class="block border border-grey-light w-full p-3 rounded mb-4" name="email"
                        placeholder="Email" required />

                    <input type="password" class="block border border-grey-light w-full p-3 rounded mb-4" name="password"
                        placeholder="Password" required />

                    <div class="my-4">
                        <input type="radio" name="gender" id="L" value="L" required>
                        <label for="L">Laki-laki</label>
                        <input type="radio" name="gender" id="P" value="P" required>
                        <label for="P">Perempuan</label>
                    </div>

                    <div class="my-4">
                        <input type="radio" name="role" id="developer" value="developer" required>
                        <label for="developer">Developer</label>
                        <input type="radio" name="role" id="buyer" value="buyer" required>
                        <label for="buyer">Buyer</label>
                    </div>


                    <button type="submit"
                        class="w-full text-center bg-green-400 py-3 rounded-md text-white hover:bg-blue-400">Create
                        Account</button>
                </form>
                <div class="text-grey-dark mt-6">
                    Already have an account?
                    <a class="no-underline border-b border-blue text-blue" href="../login/">
                        Log in
                    </a>.
                </div>
            </div>
        </div>
    @endsection
