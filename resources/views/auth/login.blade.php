@extends('layouts.guest')

@section('title', 'Masuk ke Akun')

@section('content')
        <div class="container relative z-3">
            <div class="flex justify-center">
                <div
                    class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-700 rounded-md">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo-icon.png') }}" class="mx-auto"
                            alt=""></a>
                    <h5 class="my-6 text-xl font-semibold text-center">Masuk</h5>

                    {{-- Status session (seperti sukses reset password) --}}
                    @if (session('status'))
                        <div class="mb-4 text-green-600 text-center font-medium">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="text-start">
                        @csrf

                        <div class="grid grid-cols-1">
                            {{-- Email Address --}}
                            <div class="mb-4">
                                <label class="font-semibold" for="email">Email</label>
                                <input id="email" name="email" type="email"
                                    class="mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0"
                                    placeholder="name@example.com" value="{{ old('email') }}" required autofocus
                                    autocomplete="username">
                                @error('email')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-4">
                                <label class="font-semibold" for="password">Password</label>
                                <input id="password" name="password" type="password"
                                    class="mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0"
                                    placeholder="Password" required autocomplete="current-password">
                                @error('password')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Remember Me & Forgot Password --}}
                            <div class="flex justify-between mb-4">
                                <div class="flex items-center mb-0">
                                    <input id="remember_me" name="remember" type="checkbox"
                                        class="form-checkbox size-4 appearance-none rounded border border-gray-200 dark:border-gray-800 accent-red-600 checked:appearance-auto dark:accent-red-600 focus:border-red-300 focus:ring-0 focus:ring-offset-0 focus:ring-red-200 focus:ring-opacity-50 me-2">
                                    <label for="remember_me" class="form-checkbox-label text-slate-400">Remember
                                        me</label>
                                </div>

                                @if (Route::has('password.request'))
                                    <p class="text-slate-400 mb-0">
                                        <a href="{{ route('password.request') }}"
                                            class="text-slate-400 hover:underline">Lupa password?</a>
                                    </p>
                                @endif
                            </div>

                            {{-- Submit --}}
                            <div class="mb-4">
                                <button type="submit"
                                    class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 hover:bg-red-600 text-white rounded-md w-full">
                                    Masuk
                                </button>
                            </div>

                            {{-- OR separator --}}
                            <div class="flex items-center justify-center mb-4">
                                <span class="text-slate-500 text-sm">or</span>
                            </div>

                            {{-- Google Login Button (Clean Look, No Border) --}}
                            <div class="mb-4">
                                <a href="{{ route('google.login') }}"
                                    class="py-2 px-4 flex items-center justify-center gap-3 w-full bg-white hover:bg-gray-100 text-gray-800 rounded-md text-sm font-medium transition shadow-sm hover:shadow-md dark:bg-slate-800 dark:text-gray-100 dark:hover:bg-slate-700">
                                    
                                    {{-- Google logo SVG --}}
                                    <svg class="w-5 h-5" viewBox="0 0 48 48">
                                        <path fill="#EA4335" d="M24 9.5c3.15 0 5.85 1.09 8.05 2.87l6.05-6.05C34.95 3.3 29.8 1 24 1 14.85 1 7.05 6.95 3.7 15h8.75C14.45 10.45 18.85 7.5 24 7.5z"/>
                                        <path fill="#4285F4" d="M46.1 24.5c0-1.45-.15-2.85-.4-4.15H24v7.85h12.45c-.6 3.15-2.6 5.8-5.55 7.6v6.25h8.95c5.25-4.8 8.25-11.85 8.25-19.55z"/>
                                        <path fill="#FBBC05" d="M12.45 28.55A10.7 10.7 0 0111 24c0-1.55.35-3.05.95-4.4H3.7A23.94 23.94 0 001 24c0 3.85.95 7.45 2.7 10.55l8.75-6z"/>
                                        <path fill="#34A853" d="M24 47c6.5 0 11.95-2.15 15.95-5.85l-8.95-6.25c-2.45 1.6-5.6 2.55-9 2.55-5.15 0-9.55-2.95-11.8-7.25l-8.75 6C7.05 41.05 14.85 47 24 47z"/>
                                        <path fill="none" d="M1 1h46v46H1z"/>
                                    </svg>

                                    <span>Masuk dengan Google</span>
                                </a>
                            </div>


                            {{-- Register --}}
                            <div class="text-center">
                                <span class="text-slate-400 me-2">Tidak memiliki akun?</span>
                                <a href="{{ route('register') }}"
                                    class="text-slate-900 dark:text-white font-bold inline-block hover:underline">Daftar</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
@endsection
