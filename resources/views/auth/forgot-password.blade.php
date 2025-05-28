@extends('layouts.guest')

@section('title', 'Lupa Password')

@section('content')
            <div class="container relative z-3">
                <div class="flex justify-center">
                    <div class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-700 rounded-md">
                        <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo-icon.png') }}" class="mx-auto" alt=""></a>
                        <h5 class="my-6 text-xl font-semibold text-center">Reset Password</h5>

                        @if (session('status'))
                            <div class="mb-4 text-green-600 text-sm font-medium text-center">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="grid grid-cols-1">
                            <p class="text-slate-400 mb-6 text-sm text-center">
                                Silakan masukkan alamat email Anda. Kami akan mengirimkan tautan untuk membuat kata sandi baru melalui email.
                            </p>

                            <form method="POST" action="{{ route('password.email') }}" class="text-start">
                                @csrf
                                <div class="mb-4">
                                    <label class="font-semibold" for="email">Email</label>
                                    <input id="email" name="email" type="email"
                                        class="mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0"
                                        placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                                    @error('email')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <button type="submit"
                                        class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 hover:bg-red-600 text-white rounded-md w-full">
                                        Kirim Tautan Reset
                                    </button>
                                </div>

                                <div class="text-center">
                                    <span class="text-slate-400 me-2">Ingat password?</span>
                                    <a href="{{ route('login') }}" class="text-slate-900 dark:text-white font-bold inline-block hover:underline">Masuk</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
