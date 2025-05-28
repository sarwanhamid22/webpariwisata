@extends('layouts.guest')

@section('title', 'Verifikasi Email')

@section('content')
        <div class="container relative z-3">
            <div class="flex justify-center">
                <div class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-700 rounded-md">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo-icon.png') }}" class="mx-auto" alt=""></a>
                    <h5 class="my-6 text-xl font-semibold text-center">Verifikasi Email Anda</h5>

                    @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 text-green-600 text-sm font-medium text-center">
                        Link verifikasi baru telah dikirim ke email Anda.
                    </div>
                    @endif

                    <div class="grid grid-cols-1 text-center">
                        <p class="text-slate-400 mb-6">
                            Terima kasih telah mendaftar! Silakan verifikasi email Anda dengan mengklik tautan yang kami kirim. Jika belum menerima emailnya, Anda bisa meminta ulang di bawah ini.
                        </p>

                        <form method="POST" action="{{ route('verification.send') }}" class="mb-4">
                            @csrf
                            <button type="submit"
                                class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 hover:bg-red-600 text-white rounded-md w-full">
                                Kirim Ulang Email Verifikasi
                            </button>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="text-slate-900 dark:text-white font-bold hover:underline text-sm">
                                Keluar dari Akun
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
