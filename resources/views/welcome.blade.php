@extends('layouts.app')

@section('title')

@section('content')
    <!-- Start Hero -->
    <section class="swiper-slider-hero relative block h-screen" id="home">
        <div class="swiper-container absolute end-0 top-0 w-full h-full">
            <div class="swiper-wrapper">
                @foreach ($heroSlides as $slide)
                    <div class="swiper-slide flex items-center overflow-hidden">
                        <div class="slide-inner absolute end-0 top-0 w-full h-full slide-bg-image flex items-center bg-center"
                            data-background="{{ asset('storage/' . $slide->image) }}">
                            <div class="absolute inset-0 bg-slate-900/70"></div>
                            <div class="container relative">
                                <div class="grid grid-cols-1">
                                    <div class="text-center">
                                        <img src="{{ asset('assets/images/map-plane.png') }}" class="mx-auto w-[300px]"
                                            alt="">

                                        @php
                                            $words = explode(' ', $slide->title);
                                            $half = ceil(count($words) / 2);
                                            $firstLine = implode(' ', array_slice($words, 0, $half));
                                            $secondLine = implode(' ', array_slice($words, $half));
                                        @endphp

                                        <h1
                                            class="font-bold text-white lg:leading-normal leading-normal text-4xl lg:text-6xl mb-6 mt-5">
                                            {!! $firstLine !!} <br> {!! $secondLine !!}
                                        </h1>

                                        <p class="text-white/70 text-xl max-w-xl mx-auto">
                                            {{ $slide->subtitle }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- Hero End -->

    <!-- Start -->
    <section class="relative md:py-24 py-16 overflow-hidden">
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Destinasi Terpopuler</h3>

                <p class="text-slate-400 max-w-xl mx-auto">
                    Pilihan destinasi terpopuler di Wakatobi menantimu.
                </p>
            </div>
            <div class="grid grid-cols-1 relative mt-6">
            <div class="tiny-five-item">
            @foreach ($topDestinasi as $destinasi)
                    <div class="tiny-slide">
                        <div class="group relative overflow-hidden rounded-md shadow-sm dark:shadow-gray-800 m-2">
                            <a href="{{ route('destinasi.show', $destinasi->slug) }}">
                                <img src="{{ asset('storage/' . $destinasi->image) }}"
                                    class="w-full h-72 object-cover scale-125 group-hover:scale-100 duration-500"
                                    alt="{{ $destinasi->title }}">
                                <div class="absolute inset-0 bg-gradient-to-b to-slate-900 from-transparent opacity-0 group-hover:opacity-100 duration-500"></div>
                            </a>
                            <div class="absolute p-4 bottom-0 start-0">
                                <a href="{{ route('destinasi.show', $destinasi->slug) }}"
                                    class="text-lg font-medium text-white hover:text-red-500 duration-500 ease-in-out">
                                    {{ $destinasi->location }}
                                </a>
                                <p class="text-white/70 group-hover:text-white text-sm duration-500">
                                    {{ number_format($destinasi->reviews_avg_rating ?? 0, 1) }} ★ ({{ $destinasi->reviews_count }} review)
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative md:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-6 md:text-3xl text-2xl font-semibold">Destinasi</h3>
                <p class="text-slate-400 max-w-xl mx-auto">
                Jelajahi keindahan Wakatobi yang siap memberikan pengalaman tak terlupakan.
                </p>
            </div>

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6">
                @forelse($newDestinasi as $destinasi)
                    <div class="group rounded-md shadow-sm">
                        <a href="{{ route('destinasi.show', $destinasi->slug) }}">
                            <div data-aos="zoom-in" class="relative overflow-hidden rounded-t-md shadow-sm mx-3 mt-3" style="height: 200px;">
                                <img src="{{ asset('storage/' . $destinasi->image) }}" alt="{{ $destinasi->title }}"
                                    class="absolute inset-0 w-full h-full object-cover transition duration-500 scale-125 group-hover:scale-100 rounded-t-md">
                            </div>
                        </a>

                        <div class="p-4">
                            <p class="flex items-center text-slate-400 font-medium mb-2">
                                <i data-feather="map-pin" class="text-red-500 size-4 me-1"></i> {{ $destinasi->location }}
                            </p>
                            <a href="{{ route('destinasi.show', $destinasi->slug) }}"
                                class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out">
                                {{ $destinasi->title }}
                            </a>

                            <div class="flex items-center mt-2">
                                @php
                                    $averageRating = $destinasi->reviews_avg_rating ?? 0;
                                    $totalReviews = $destinasi->reviews_count ?? 0;
                                    $averageRatingRounded = round($averageRating);
                                @endphp

                                @if ($totalReviews > 0)
                                    <span class="text-slate-400">Rating:</span>
                                    <ul class="text-lg font-medium text-amber-400 list-none ms-2 flex items-center">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <li class="inline">
                                                <i class="mdi mdi-star align-middle {{ $i <= $averageRatingRounded ? '' : 'text-gray-300' }}"></i>
                                            </li>
                                        @endfor
                                        <li class="inline text-slate-900 text-sm ms-2">
                                            {{ number_format($averageRating, 1) }}
                                            <span class="text-slate-500">({{ $totalReviews }})</span>
                                        </li>
                                    </ul>
                                @else
                                    <span class="text-slate-400 italic text-sm">Belum ada review</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center">
                        <p class="text-slate-500 dark:text-slate-400">Belum ada destinasi baru saat ini.</p>
                    </div>
                @endforelse
            </div>


            <div class="mt-6 text-center">
                <a href="{{ route('destinasi.index') }}" class="text-slate-400 hover:text-red-500 inline-block">
                    Lihat Semua Destinasi <i class="mdi mdi-arrow-right align-middle"></i>
                </a>
            </div>
        </div>

        <div class="container relative md:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-6 md:text-3xl text-2xl font-semibold">Peta Wakatobi</h3>
                <p class="text-slate-400 max-w-xl mx-auto">
                    Telusuri lokasi wisata berdasarkan wilayah Wakatobi.
                </p>
            </div>
            <div id="google-map" class="h-[500px] md:h-[600px] rounded-lg shadow-lg"></div>
        </div>


        <div class="container relative md:mt-24 mt-16">
            <div class="grid grid-cols-1 pb-6 text-center">
                <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Memoar Wisata</h3>
                <p class="text-slate-400 max-w-xl mx-auto">
                    Cerita dan pengalaman menarik dari para pelancong saat menjelajahi keindahan Wakatobi.
                </p>
            </div>

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6">
                @forelse($blogs as $blog)
                    <div class="group relative overflow-hidden">
                        <div data-aos="zoom-in" class="relative overflow-hidden rounded-md shadow-sm dark:shadow-gray-800" style="padding-top: 75%;">
                            <a href="{{ route('blog.show', $blog->slug) }}">
                                <img src="{{ asset('storage/' . $blog->image) }}"
                                    alt="{{ $blog->title }}"
                                    class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 group-hover:rotate-3 duration-500 rounded-md">
                            </a>
                            @if($blog->location)
                                <div class="absolute top-0 start-0 p-4 opacity-0 group-hover:opacity-100 duration-500 force-show-on-mobile">
                                    <span class="bg-red-500 text-white text-[12px] px-2.5 py-1 font-medium rounded-md">
                                        {{ $blog->location }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <div class="mt-6">
                            <div class="flex items-center text-sm text-slate-400 mb-2">
                                by
                                <span class="ms-1 text-slate-900 dark:text-white font-medium hover:text-red-500 dark:hover:text-red-500">
                                    {{ $blog->user->name }}
                                </span>
                            </div>

                            <a href="{{ route('blog.show', $blog->slug) }}"
                                class="block text-lg font-semibold hover:text-red-500 duration-500 ease-in-out">
                                {{ \Illuminate\Support\Str::limit($blog->title, 60) }}
                            </a>

                            <p class="text-slate-400 mt-2 text-sm">
                                {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 100) }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center">
                        <p class="text-slate-500 dark:text-slate-400">Belum ada Memoar Wisata yang dibagikan.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('blog.index') }}" class="text-slate-400 hover:text-red-500 inline-block">
                    Lihat Semua Memoar <i class="mdi mdi-arrow-right align-middle"></i>
                </a>
            </div>
        </div>

<div class="container relative md:mt-24 mt-16">
    <div class="grid grid-cols-1 pb-8 text-center">
        <h3 class="mb-6 md:text-3xl text-2xl font-semibold">Ulasan Terbaru</h3>
        <p class="text-slate-400 max-w-xl mx-auto">Apa kata mereka tentang Wakatobi? Lihat pengalaman terbaru dari para wisatawan.</p>
    </div>

    <div class="grid grid-cols-1 relative mt-6">
        <div class="tiny-three-item">
            @foreach ($reviewTerbaru as $review)
                <div class="tiny-slide">
                    <div class="group rounded-md shadow-sm bg-white dark:bg-slate-900 p-6 m-2">
                        <div class="flex items-center gap-3 mb-4">
                            @if ($review->user->image)
                                <img src="{{ asset('storage/' . $review->user->image) }}"
                                    class="w-10 h-10 aspect-square rounded-full object-cover border border-slate-300 shadow"
                                    alt="{{ $review->user->name }}">
                            @else
                                <img src="{{ asset('assets/images/client/16.jpg') }}"
                                    class="w-10 h-10 aspect-square rounded-full object-cover border border-slate-300 shadow"
                                    alt="{{ $review->user->name }}">
                            @endif
                            <div>
                                <h6 class="text-sm font-semibold text-slate-800 dark:text-white">{{ $review->user->name }}</h6>
                                <p class="text-xs text-slate-500 flex items-center">
                                    <i data-feather="map-pin" class="text-red-500 size-4 me-1"></i>
                                    {{ $review->destinasi->location }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center mb-2 text-amber-400">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="mdi mdi-star{{ $i <= round($review->rating) ? '' : '-outline' }} text-lg"></i>
                            @endfor
                            <span class="ml-2 text-sm text-slate-700 dark:text-slate-300">
                                {{ number_format($review->rating, 1) }}
                            </span>
                        </div>

                        <p class="text-slate-500 text-sm italic mt-2">
                            “{{ \Illuminate\Support\Str::limit(strip_tags($review->review), 100) }}”
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>



    </section><!--end section-->
    <!-- End -->

@endsection


@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLU1Ge-6AqY0IKW0pcqJeWUfYxVf3dIJk&callback=initMap" async defer></script>

<script>
    function initMap() {
        const wakatobiCenter = { lat: -5.3378, lng: 123.5901 };
        const map = new google.maps.Map(document.getElementById("google-map"), {
            zoom: 10,
            center: wakatobiCenter
        });

        const geocoder = new google.maps.Geocoder();
        const locations = {!! json_encode($newDestinasi) !!};

        locations.forEach(destinasi => {
            if (destinasi.location) {
                geocoder.geocode({ address: destinasi.location }, (results, status) => {
                    if (status === "OK" && results[0]) {
                        const marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location,
                            title: destinasi.title
                        });

                        const infoWindow = new google.maps.InfoWindow({
                            content: `
                                <div>
                                    <strong>${destinasi.title}</strong><br>
                                    <a href="/destinasi/${destinasi.slug}" class="text-red-500 hover:underline">Lihat detail</a>
                                </div>
                            `
                        });

                        marker.addListener("click", () => {
                            infoWindow.open(map, marker);
                        });
                    } else {
                        console.warn(`Geocode gagal untuk ${destinasi.location}: ${status}`);
                    }
                });
            }
        });
    }
</script>


@endsection
