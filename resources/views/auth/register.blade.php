@extends('layouts.guest')

@section('title', 'Daftar Akun')

@section('content')
        <div class="container relative z-3">
            <div class="flex justify-center">
                <div
                    class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-700 rounded-md">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo-icon.png') }}" class="mx-auto"
                            alt=""></a>
                    <h5 class="my-6 text-xl font-semibold text-center">Daftar</h5>

                    <form class="text-start" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="grid grid-cols-1">

                            <div class="mb-4">
                                <label class="font-semibold" for="RegisterName">Nama</label>
                                <input id="RegisterName" name="name" type="text"
                                    class="mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none 
                                                border border-gray-100 dark:border-gray-800 focus:ring-0"
                                    placeholder="Sarwan" value="{{ old('name') }}" required autofocus
                                    autocomplete="name">
                                @error('name')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="font-semibold" for="LoginEmail">Email</label>
                                <input id="LoginEmail" name="email" type="email"
                                    class="mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none 
                                                border border-gray-100 dark:border-gray-800 focus:ring-0"
                                    placeholder="name@example.com" value="{{ old('email') }}" required
                                    autocomplete="username">
                                @error('email')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="font-semibold" for="LoginPassword">Password</label>
                                <input id="LoginPassword" name="password" type="password"
                                    class="mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none 
                                                border border-gray-100 dark:border-gray-800 focus:ring-0"
                                    placeholder="Password" required autocomplete="new-password">
                                @error('password')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="font-semibold" for="password_confirmation">Konfirmasi Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    class="mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none 
                                                border border-gray-100 dark:border-gray-800 focus:ring-0"
                                    placeholder="Confirm Password" required autocomplete="new-password">
                            </div>


                            <div class="mb-4">
                                <button type="submit"
                                    class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center 
                                                bg-red-500 text-white rounded-md w-full">
                                    Daftar
                                </button>
                            </div>

                            <div class="text-center">
                                <span class="text-slate-400 me-2">Sudah memiliki akun ? </span>
                                <a href="{{ route('login') }}"
                                    class="text-slate-900 dark:text-white font-bold inline-block">Masuk</a>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
@endsection
