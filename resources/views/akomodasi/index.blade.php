@extends('layouts.app')

@section('title', 'Akomodasi Wisata')

@section('head')
    <style>
        .pesan-alert {
            width: 100%;
            border: 2px solid #dc2626;
            color: #dc2626;
            padding: 1rem;
            border-radius: 0.5rem;
            text-align: center;
            margin: 0 auto 2rem auto;
            background-color: #fef2f2;
        }
    </style>
@endsection


@section('content')

    <!-- Start Hero -->
    <section
        class="relative table w-full items-center py-36 bg-[url('../../assets/images/bg/cta.jpg')] bg-top bg-no-repeat bg-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 text-center mt-10">
                <h3 class="text-4xl leading-normal tracking-wider font-semibold text-white">Temukan Akomodasi Terbaik</h3>
            </div>
        </div>

        <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
            <ul class="tracking-[0.5px] mb-0 inline-block">
                <li
                    class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white">
                    <a href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="inline-block text-base text-white/50 mx-0.5">
                    <i class="mdi mdi-chevron-right"></i>
                </li>
                <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white"
                    aria-current="page">
                    Akomodasi Wisata
                </li>
            </ul>
        </div>
    </section>
    <!-- End Hero -->

    <!-- Start Akomodasi List -->
    <section class="relative md:py-24 py-16">
        <div class="container relative">

            {{-- Pesan --}}
            <div class="pesan-alert">
                Beragam akomodasi tersedia di Wakatobi, mulai dari resor hingga losmen keluarga yang sederhana. Karena belum ada jaringan hotel besar, pemesanan umumnya dilakukan melalui telepon atau WhatsApp. Sebagian penyedia belum sepenuhnya menggunakan platform daring, jadi disarankan untuk menghubungi langsung atau memesan saat tiba di lokasi.
            </div>

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6 mt-10">
                @forelse($akomodasis as $akomodasi)
                    <div class="group rounded-md shadow-sm dark:shadow-gray-700">
                        <div data-aos="zoom-in"
                            class="relative overflow-hidden rounded-t-md shadow-sm dark:shadow-gray-700 mx-3 mt-3"
                            style="height: 220px;"> {{-- Atur tinggi di sini --}}
                            
                            {{-- Ambil gambar pertama atau fallback --}}
                            @php
                                $firstImage = $akomodasi->images->first()->image ?? 'assets/images/default.jpg';
                            @endphp

                            <a href="{{ route('akomodasi.show', $akomodasi->slug) }}">
                                <img src="{{ asset('storage/' . $firstImage) }}"
                                    class="absolute inset-0 w-full h-full object-cover transition duration-500 scale-125 group-hover:scale-100"
                                    alt="{{ $akomodasi->nama }}">
                            </a>

                            @if ($akomodasi->harga_mulai)
                                <div class="absolute top-0 start-0 p-4">
                                    <span class="bg-red-500 text-white text-[12px] px-2.5 py-1 font-medium rounded-md h-5">
                                        {{ $akomodasi->lokasi ?? '-' }}
                                    </span>
                                </div>
                            @endif
                        </div>


                        <div class="p-4">
                            <p class="flex items-center text-slate-400 font-medium mb-2">
                                <i data-feather="map-pin" class="text-red-500 size-4 me-1"></i>
                                {{ $akomodasi->alamat ?? '-' }}
                            </p>
                            <a href="{{ route('akomodasi.show', $akomodasi->slug) }}"
                                class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">
                                {{ $akomodasi->nama }}
                            </a>

                            <div
                                class="mt-4 pt-4 flex justify-between items-center border-t border-slate-100 dark:border-gray-800">
                                <h5 class="text-lg font-medium text-red-500">
                                    Rp {{ number_format($akomodasi->harga_mulai, 0, ',', '.') }} / Malam
                                </h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center mt-6">
                        <p class="text-slate-500 dark:text-slate-400">Belum ada akomodasi yang tersedia.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination Custom -->
            @if ($akomodasis->hasPages())
                <div class="grid md:grid-cols-12 grid-cols-1 mt-10">
                    <div class="md:col-span-12 text-center">
                        <nav aria-label="Page navigation">
                            <ul class="inline-flex items-center -space-x-px">
                                {{-- Prev --}}
                                <li>
                                    <a href="{{ $akomodasis->previousPageUrl() ?: '#' }}"
                                        class="size-[40px] inline-flex justify-center items-center
                                    text-slate-400 dark:text-slate-500
                                    bg-white dark:bg-slate-800
                                    rounded-s-3xl
                                    @if ($akomodasis->onFirstPage()) opacity-50 cursor-not-allowed @endif
                                    hover:text-white
                                    border border-gray-100 dark:border-gray-700
                                    hover:border-red-500 hover:bg-red-500">
                                        <i data-feather="chevron-left" class="size-5"></i>
                                    </a>
                                </li>

                                {{-- Pages --}}
                                @foreach (range(1, $akomodasis->lastPage()) as $page)
                                    <li>
                                        <a href="{{ $akomodasis->url($page) }}"
                                            class="size-[40px] inline-flex justify-center items-center
                            {{ $akomodasis->currentPage() == $page
                                ? 'z-10 text-white bg-red-500 border-red-500'
                                : 'text-slate-400 dark:text-slate-500 bg-white dark:bg-slate-800 border border-gray-100 dark:border-gray-700 hover:border-red-500 hover:bg-red-500 hover:text-white' }}">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endforeach

                                {{-- Next --}}
                                <li>
                                    <a href="{{ $akomodasis->nextPageUrl() ?: '#' }}"
                                        class="size-[40px] inline-flex justify-center items-center
                                    text-slate-400 dark:text-slate-500
                                    bg-white dark:bg-slate-800
                                    rounded-e-3xl
                                    @if (!$akomodasis->hasMorePages()) opacity-50 cursor-not-allowed @endif
                                    hover:text-white
                                    border border-gray-100 dark:border-gray-700
                                    hover:border-red-500 hover:bg-red-500">
                                        <i data-feather="chevron-right" class="size-5"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            @endif

        </div><!--end container-->
    </section>
    <!-- End Akomodasi List -->


@endsection
