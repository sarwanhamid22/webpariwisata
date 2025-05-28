@extends('layouts.app')

@section('title', 'Destinasi Wisata')

@section('content')

    <!-- Start Hero -->
    <section
        class="relative table w-full items-center py-36 bg-[url('../../assets/images/bg/cta.jpg')] bg-top bg-no-repeat bg-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 text-center mt-10">
                <h3 class="text-4xl leading-normal tracking-wider font-semibold text-white">Daftar Destinasi Wisata</h3>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
            <ul class="tracking-[0.5px] mb-0 inline-block">
                <li
                    class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white">
                    <a href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i
                        class="mdi mdi-chevron-right"></i></li>
                <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white"
                    aria-current="page">Destinasi Wisata</li>
            </ul>
        </div>
    </section><!--end section-->
    <!-- End Hero -->

    <!-- Start -->
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6">
                @forelse($destinasis as $destinasi)
                    <div class="group rounded-md shadow-sm">
                        <a href="{{ route('destinasi.show', $destinasi->slug) }}">
                            <div data-aos="zoom-in" class="relative overflow-hidden rounded-t-md shadow-sm mx-3 mt-3"
                                style="height: 200px;">
                                <img src="{{ asset('storage/' . $destinasi->image) }}" alt="{{ $destinasi->title }}"
                                    class="absolute inset-0 w-full h-full object-cover transition duration-500 scale-125 group-hover:scale-100 rounded-t-md">
                            </div>
                        </a>

                        <div class="p-4">
                            <p class="flex items-center text-slate-400 font-medium mb-2">
                                <i data-feather="map-pin" class="text-red-500 size-4 me-1"></i>
                                {{ $destinasi->location }}
                            </p>
                            <a href="{{ route('destinasi.show', $destinasi->slug) }}"
                                class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">
                                {{ $destinasi->title }}
                            </a>

                            <div class="flex items-center mt-2">
                                @php
                                    $averageRating = $destinasi->averageRating() ?? 0;
                                    $totalReviews = $destinasi->totalReviews() ?? 0;
                                    $averageRatingRounded = round($averageRating);
                                @endphp

                                @if ($totalReviews > 0)
                                    <span class="text-slate-400">Rating:</span>
                                    <ul class="text-lg font-medium text-amber-400 list-none ms-2 flex items-center">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <li class="inline">
                                                <i
                                                    class="mdi mdi-star align-middle {{ $i <= $averageRatingRounded ? '' : 'text-gray-300' }}"></i>
                                            </li>
                                        @endfor
                                        <li class="inline text-slate-900 text-sm ms-2">
                                            {{ number_format($averageRating, 1) }}
                                            <span class="text-slate-500">({{ $totalReviews }})</span>
                                        </li>
                                    </ul>
                                @else
                                    <span class="text-slate-400 italic text-sm">Belum ada review, jadilah yang
                                        pertama!</span>
                                @endif
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center">
                        <p class="text-slate-500 dark:text-slate-400">Belum ada destinasi wisata yang tersedia.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination Custom -->
            @if ($destinasis->hasPages())
                <div class="grid md:grid-cols-12 grid-cols-1 mt-10">
                    <div class="md:col-span-12 text-center">
                        <nav aria-label="Page navigation">
                            <ul class="inline-flex items-center -space-x-px">
                                {{-- Prev --}}
                                <li>
                                    <a href="{{ $destinasis->previousPageUrl() ?: '#' }}"
                                        class="size-[40px] inline-flex justify-center items-center
                                            text-slate-400 dark:text-slate-500
                                            bg-white dark:bg-slate-800
                                            rounded-s-3xl
                                            @if ($destinasis->onFirstPage()) opacity-50 cursor-not-allowed @endif
                                            hover:text-white
                                            border border-gray-100 dark:border-gray-700
                                            hover:border-red-500 hover:bg-red-500">
                                        <i data-feather="chevron-left" class="size-5"></i>
                                    </a>
                                </li>

                                {{-- Pages --}}
                                @foreach (range(1, $destinasis->lastPage()) as $page)
                                    <li>
                                        <a href="{{ $destinasis->url($page) }}"
                                            class="size-[40px] inline-flex justify-center items-center
                                    {{ $destinasis->currentPage() == $page
                                        ? 'z-10 text-white bg-red-500 border-red-500'
                                        : 'text-slate-400 dark:text-slate-500 bg-white dark:bg-slate-800 border border-gray-100 dark:border-gray-700 hover:border-red-500 hover:bg-red-500 hover:text-white' }}">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endforeach

                                {{-- Next --}}
                                <li>
                                    <a href="{{ $destinasis->nextPageUrl() ?: '#' }}"
                                        class="size-[40px] inline-flex justify-center items-center
                                            text-slate-400 dark:text-slate-500
                                            bg-white dark:bg-slate-800
                                            rounded-e-3xl
                                            @if (!$destinasis->hasMorePages()) opacity-50 cursor-not-allowed @endif
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
    <!--end section-->


@endsection
