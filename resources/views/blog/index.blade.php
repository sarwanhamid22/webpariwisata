@extends('layouts.app')

@section('title', 'Memoar Wisata')

@section('content')

    <!-- Start Hero -->
    <section
        class="relative table w-full items-center py-36 bg-[url('../../assets/images/bg/cta.jpg')] bg-top bg-no-repeat bg-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 text-center mt-10">
                <h3 class="text-4xl leading-normal tracking-wider font-semibold text-white">Memoar Wisata Yang Dibagikan</h3>
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
                    Memoar Wisata
                </li>
            </ul>
        </div>
    </section>
    <!-- End Hero -->

    <!-- Start Blog List -->
    <section class="relative md:py-24 py-16">
        <div class="container relative">

         {{-- Tombol Tambah Memoar dan Pesan Login --}}
        @auth
            <div class="flex justify-end mb-6">
                <a href="{{ route('user.blog.create') }}"
                class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                    <i class="mdi mdi-plus-circle-outline mr-2"></i> Tulis Memoar
                </a>
            </div>
        @endauth

        @guest
            <div class="flex justify-end mb-6">
                <div class="border border-gray-300 px-4 py-2 rounded-md text-sm text-slate-700">
                    Silakan <a href="{{ route('login') }}" class="underline text-red-600 hover:text-red-800">login</a>
                    terlebih dahulu untuk dapat menulis memoar.
                </div>
            </div>
        @endguest


            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6">

                @forelse($blogs as $blog)
                    <div class="group relative overflow-hidden">
                        <div data-aos="zoom-in" class="relative overflow-hidden rounded-md shadow-sm dark:shadow-gray-800"
                            style="padding-top: 75%;">
                            <a href="{{ route('blog.show', $blog->slug) }}">
                                <img src="{{ asset('storage/' . $blog->image) }}"
                                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 group-hover:rotate-3 duration-500"
                                    alt="{{ $blog->title }}">
                            </a>
                            <div
                                class="absolute top-0 start-0 p-4 opacity-0 group-hover:opacity-100 duration-500 force-show-on-mobile">
                                <span class="bg-red-500 text-white text-[12px] px-2.5 py-1 font-medium rounded-md h-5">
                                    {{ $blog->location }}
                                </span>
                            </div>

                        </div>



                        <div class="mt-6">
                            <div class="flex mb-4">
                                <span class="text-slate-400 text-sm ms-3">
                                    by <a
                                        class="text-slate-900 dark:text-white hover:text-red-500 dark:hover:text-red-500 font-medium">
                                        {{ $blog->user->name }}
                                    </a>
                                </span>
                            </div>

                            <a href="{{ route('blog.show', $blog->slug) }}"
                                class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">
                                {{ \Illuminate\Support\Str::limit($blog->title, 60) }}
                            </a>

                            <p class="text-slate-400 mt-2">
                                {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 100) }}
                            </p>


                        </div>
                    </div><!-- end content -->
                @empty
                    <div class="col-span-full text-center">
                        <p class="text-slate-500 dark:text-slate-400">Belum ada Memoar Wisata yang dibagikan.</p>
                    </div>
                @endforelse

            </div><!--end grid-->

            <!-- Pagination Custom -->
            @if ($blogs->hasPages())
                <div class="grid md:grid-cols-12 grid-cols-1 mt-10">
                    <div class="md:col-span-12 text-center">
                        <nav aria-label="Page navigation">
                            <ul class="inline-flex items-center -space-x-px">
                                {{-- Prev --}}
                                <li>
                                    <a href="{{ $blogs->previousPageUrl() ?: '#' }}"
                                        class="size-[40px] inline-flex justify-center items-center
                                      text-slate-400 dark:text-slate-500
                                      bg-white dark:bg-slate-800
                                      rounded-s-3xl
                                      @if ($blogs->onFirstPage()) opacity-50 cursor-not-allowed @endif
                                      hover:text-white
                                      border border-gray-100 dark:border-gray-700
                                      hover:border-red-500 hover:bg-red-500">
                                        <i data-feather="chevron-left" class="size-5"></i>
                                    </a>
                                </li>

                                {{-- Pages --}}
                                @foreach (range(1, $blogs->lastPage()) as $page)
                                    <li>
                                        <a href="{{ $blogs->url($page) }}"
                                            class="size-[40px] inline-flex justify-center items-center
                               {{ $blogs->currentPage() == $page
                                   ? 'z-10 text-white bg-red-500 border-red-500'
                                   : 'text-slate-400 dark:text-slate-500 bg-white dark:bg-slate-800 border border-gray-100 dark:border-gray-700 hover:border-red-500 hover:bg-red-500 hover:text-white' }}">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endforeach

                                {{-- Next --}}
                                <li>
                                    <a href="{{ $blogs->nextPageUrl() ?: '#' }}"
                                        class="size-[40px] inline-flex justify-center items-center
                                      text-slate-400 dark:text-slate-500
                                      bg-white dark:bg-slate-800
                                      rounded-e-3xl
                                      @if (!$blogs->hasMorePages()) opacity-50 cursor-not-allowed @endif
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
    <!-- End Blog List -->

@endsection
