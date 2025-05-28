@extends('layouts.app')

@section('title', 'Memoar Wisata | ' . $blog->title)

@section('head')
    <style>
        .editor-content p {
            margin-bottom: 1rem;
        }

        .editor-content ul {
            list-style-type: disc;
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }

        .editor-content ol {
            list-style-type: decimal;
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }

        .editor-content li {
            margin-bottom: 0.5rem;
        }

        .editor-content h1,
        .editor-content h2,
        .editor-content h3,
        .editor-content h4,
        .editor-content h5,
        .editor-content h6 {
            font-weight: bold;
            margin-top: 1rem;
            margin-bottom: 0.5rem;
        }

        .editor-content table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 1rem;
        }

        .editor-content table,
        .editor-content th,
        .editor-content td {
            border: 1px solid #dee2e6;
            padding: 0.5rem;
        }

        /* Gambar horizontal grid */
        .gallery-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .gallery-grid img {
            width: 140px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #ddd;
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
                <h3 class="text-4xl leading-normal tracking-wider font-semibold text-white">
                    {{ $blog->title }}
                </h3>
                <ul class="list-none mt-6">
                    <li class="inline-block text-white/50 mx-5">
                        <span class="text-white block">Author :</span>
                        <span class="block">{{ $blog->user->name }}</span>
                    </li>
                    <li class="inline-block text-white/50 mx-5">
                        <span class="text-white block">Date :</span>
                        <span class="block">{{ $blog->created_at->format('j F Y') }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
            <ul class="tracking-[0.5px] mb-0 inline-block">
                <li class="inline-block uppercase text-[13px] font-bold text-white/50 hover:text-white">
                    <a href="{{ url('/blog') }}">Memoar Wisata</a>
                </li>
                <li class="inline-block text-base text-white/50 mx-0.5">
                    <i class="mdi mdi-chevron-right"></i>
                </li>
                <li class="inline-block uppercase text-[13px] font-bold text-white"aria-current="page">{{ $blog->title }}
                </li>
            </ul>
        </div>
    </section>
    <!-- End Hero -->

    <!-- Start Blog Content -->
    <section class="relative md:py-24 py-16">
        <div class="container">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-6">
                <!-- Main Blog Content -->
                <div class="lg:col-span-8 md:col-span-6">
                    <div data-aos="zoom-in" class="relative overflow-hidden rounded-md shadow-sm">
                        @if ($blog->image)
                            <div class="relative w-full" style="padding-top: 56.25%;">
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                                    class="absolute inset-0 w-full h-full object-cover rounded-md">
                            </div>
                        @endif
                        <div class="p-6">
                            <div class="mb-4">
                                <p class="text-base text-gray-700 dark:text-slate-300">
                                    Tempat Wisata di <strong>{{ $blog->location }}</strong>
                                </p>
                            </div>
                            <div class="editor-content prose prose-lg max-w-none dark:prose-invert text-slate-800 dark:text-slate-300">
                                {!! $blog->content !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-4 md:col-span-6">
                    <div class="sticky top-20">
                        <h5 class="text-lg font-medium bg-gray-50 dark:bg-slate-800 shadow-sm rounded-md p-2 text-center">
                            Author</h5>
                        <div class="text-center mt-3">
                            @if ($blog->user->image)
                                <img src="{{ asset('storage/' . $blog->user->image) }}"
                                    class="h-20 w-20 mx-auto rounded-full shadow-sm object-cover mb-4"
                                    alt="{{ $blog->user->name }}">
                            @else
                                <img src="{{ asset('assets/images/client/16.jpg') }}"
                                    class="h-20 w-20 mx-auto rounded-full shadow-sm object-cover mb-4"
                                    alt="{{ $blog->user->name }}">
                            @endif
                            <a href="#"
                                class="text-lg font-medium hover:text-red-500 dark:text-white">{{ $blog->user->name }}</a>
                        </div>

                        @php
                            $social = $blog->user->socialProfile;
                            $facebookLink = $social?->facebook
                                ? (Str::startsWith($social->facebook, 'http')
                                    ? $social->facebook
                                    : 'https://facebook.com/' . $social->facebook)
                                : null;
                            $instagramLink = $social?->instagram
                                ? (Str::startsWith($social->instagram, 'http')
                                    ? $social->instagram
                                    : 'https://instagram.com/' . $social->instagram)
                                : null;
                            $twitterLink = $social?->twitter
                                ? (Str::startsWith($social->twitter, 'http')
                                    ? $social->twitter
                                    : 'https://twitter.com/' . $social->twitter)
                                : null;
                            $youtubeLink = $social?->youtube
                                ? (Str::startsWith($social->youtube, 'http')
                                    ? $social->youtube
                                    : $social->youtube)
                                : null;
                        @endphp

                        <ul class="list-none text-center mt-3 space-x-0.5">
                            @if ($facebookLink)
                                <li class="inline"><a href="{{ $facebookLink }}" target="_blank"
                                        class="size-8 inline-flex items-center justify-center border dark:border-gray-800 text-slate-400 hover:text-white hover:bg-red-500"><i
                                            data-feather="facebook" class="size-4"></i></a></li>
                            @endif
                            @if ($instagramLink)
                                <li class="inline"><a href="{{ $instagramLink }}" target="_blank"
                                        class="size-8 inline-flex items-center justify-center border dark:border-gray-800 text-slate-400 hover:text-white hover:bg-red-500"><i
                                            data-feather="instagram" class="size-4"></i></a></li>
                            @endif
                            @if ($twitterLink)
                                <li class="inline"><a href="{{ $twitterLink }}" target="_blank"
                                        class="size-8 inline-flex items-center justify-center border dark:border-gray-800 text-slate-400 hover:text-white hover:bg-red-500"><i
                                            data-feather="twitter" class="size-4"></i></a></li>
                            @endif
                            @if ($youtubeLink)
                                <li class="inline"><a href="{{ $youtubeLink }}" target="_blank"
                                        class="size-8 inline-flex items-center justify-center border dark:border-gray-800 text-slate-400 hover:text-white hover:bg-red-500"><i
                                            data-feather="youtube" class="size-4"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Related Blogs -->
            <div class="container lg:mt-24 mt-16">
                <div class="grid grid-cols-1 mb-6 text-center">
                    <h3 class="font-semibold text-3xl leading-normal">Memoar Wisata Lainnya</h3>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-6 pt-6">
                    @forelse($relatedBlogs as $related)
                        <div data-aos="zoom-in" class="group relative overflow-hidden">
                            <div class="relative overflow-hidden rounded-md shadow-sm" style="padding-top: 75%;">
                                <a href="{{ route('blog.show', $related->slug) }}">
                                    <img src="{{ asset('storage/' . $related->image) }}"
                                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 group-hover:rotate-3 duration-500"
                                        alt="{{ $related->title }}">
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
                                        by <a href="#"
                                            class="text-slate-900 dark:text-white hover:text-red-500">{{ $related->user->name ?? 'Unknown' }}</a>
                                    </span>
                                </div>

                                <a href="{{ route('blog.show', $related->slug) }}"
                                    class="text-lg font-semibold hover:text-red-500">
                                    {{ \Illuminate\Support\Str::limit($related->title, 60) }}
                                </a>
                                <p class="text-slate-400 mt-2">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($related->content), 100) }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center">
                            <p class="text-slate-500 dark:text-slate-400">Belum ada memoar wisata terkait.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </section>
    <!-- End Blog Content -->

@endsection
