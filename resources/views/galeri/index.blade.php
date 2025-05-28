@extends('layouts.app')

@section('title', 'Galeri Wisata')

@section('head')
    <style>
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* Mobile = 2 kolom */
            gap: 16px;
        }

        /* Di atas 640px (sm) jadi 3 kolom */
        @media (min-width: 640px) {
            .gallery-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* Di atas 768px (md) jadi 4 kolom */
        @media (min-width: 768px) {
            .gallery-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }


        .gallery-item {
            position: relative;
            width: 100%;
            padding-top: 100%;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .gallery-item a {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .gallery-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: transform 0.5s ease, opacity 0.5s ease;
            display: block;
        }

        .gallery-item:hover .gallery-img {
            transform: scale(1.08);
            opacity: 0.9;
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
                <h3 class="text-4xl leading-normal tracking-wider font-semibold text-white">Galeri Foto Publik Wisatawan</h3>
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
                    Galeri Wisata
                </li>
            </ul>
        </div>
    </section>
    <!-- End Hero -->

    <section class="relative md:py-24 py-16">
        <div class="container relative">
            {{-- Tambahkan Galeri Button --}}
            @auth
                <div class="flex justify-end mb-6">
                    <a href="{{ route('user.galeri.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                        <i class="mdi mdi-plus-circle-outline mr-2"></i> Tambahkan Galeri
                    </a>
                </div>
            @endauth

            @guest
                <div class="flex justify-end mb-6">
                    <div class="border border-gray-300 px-4 py-2 rounded-md text-sm text-slate-700">
                        Silakan <a href="{{ route('login') }}" class="underline text-red-600 hover:text-red-800">login</a>
                        terlebih dahulu untuk dapat menambahkan galeri.
                    </div>
                </div>
            @endguest


            <div class="gallery-grid">
                @forelse($items as $item)
                    <div data-aos="zoom-in" class="gallery-item">
                        <a href="{{ asset('storage/' . $item->image) }}" class="block group relative overflow-hidden lightbox">
                            <!-- Gambar utama -->
                            <img src="{{ asset('storage/' . $item->image) }}"
                                alt="Tempat Wisata di {{ $item->title }}"
                                class="gallery-img"
                                onerror="this.onerror=null;this.src='{{ asset('assets/images/blog/9.jpg') }}';">

                            <!-- Ikon kamera overlay -->
                            <span class="absolute inset-0 z-10 flex items-center justify-center opacity-0 group-hover:opacity-100 bg-black/30 duration-300">
                                <span class="inline-flex justify-center items-center size-9 bg-red-500 text-white rounded-full">
                                    <i data-feather="camera" class="size-4 align-middle"></i>
                                </span>
                            </span>
                        </a>

                    </div>
                @empty
                    <div class="col-span-full text-center">
                        <p class="text-slate-500 dark:text-slate-400">Belum ada galeri Wisata yang dibagikan.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination Custom -->
            @if ($items->hasPages())
                <div class="grid md:grid-cols-12 grid-cols-1 mt-10">
                    <div class="md:col-span-12 text-center">
                        <nav aria-label="Page navigation">
                            <ul class="inline-flex items-center -space-x-px">
                                {{-- Prev --}}
                                <li>
                                    <a href="{{ $items->previousPageUrl() ?: '#' }}"
                                        class="size-[40px] inline-flex justify-center items-center
                                      text-slate-400 dark:text-slate-500
                                      bg-white dark:bg-slate-800
                                      rounded-s-3xl
                                      @if ($items->onFirstPage()) opacity-50 cursor-not-allowed @endif
                                      hover:text-white
                                      border border-gray-100 dark:border-gray-700
                                      hover:border-red-500 hover:bg-red-500">
                                        <i data-feather="chevron-left" class="size-5"></i>
                                    </a>
                                </li>

                                {{-- Pages --}}
                                @foreach (range(1, $items->lastPage()) as $page)
                                    <li>
                                        <a href="{{ $items->url($page) }}"
                                            class="size-[40px] inline-flex justify-center items-center
                               {{ $items->currentPage() == $page
                                   ? 'z-10 text-white bg-red-500 border-red-500'
                                   : 'text-slate-400 dark:text-slate-500 bg-white dark:bg-slate-800 border border-gray-100 dark:border-gray-700 hover:border-red-500 hover:bg-red-500 hover:text-white' }}">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endforeach

                                {{-- Next --}}
                                <li>
                                    <a href="{{ $items->nextPageUrl() ?: '#' }}"
                                        class="size-[40px] inline-flex justify-center items-center
                                      text-slate-400 dark:text-slate-500
                                      bg-white dark:bg-slate-800
                                      rounded-e-3xl
                                      @if (!$items->hasMorePages()) opacity-50 cursor-not-allowed @endif
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
        </div>
    </section>





@endsection
