@extends('layouts.guest')

@section('title', 'Reset Password')

@section('content')
    <div class="container relative z-3">
        <div class="flex justify-center">
            <div class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-700 rounded-md">
                <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo-icon.png') }}" class="mx-auto" alt=""></a>
                <h5 class="my-6 text-xl font-semibold text-center">Reset Password</h5>

                {{-- FORM RESET --}}
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="mb-4">
                        <label class="font-semibold" for="email">Email</label>
                        <input type="email" name="email" id="email" required autofocus
                            value="{{ old('email', $request->email) }}"
                            class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 text-slate-900 dark:text-white border border-gray-200 dark:border-gray-700 rounded">
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="font-semibold" for="password">Password Baru</label>
                        <input type="password" name="password" id="password" required autocomplete="new-password"
                            class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 text-slate-900 dark:text-white border border-gray-200 dark:border-gray-700 rounded">
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="font-semibold" for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password"
                            class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 text-slate-900 dark:text-white border border-gray-200 dark:border-gray-700 rounded">
                        @error('password_confirmation')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <button type="submit"
                            class="w-full py-2 px-4 text-white bg-red-500 hover:bg-red-600 rounded-md transition">
                            Simpan Password Baru
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
