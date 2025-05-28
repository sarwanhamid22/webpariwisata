@extends('layouts.app')

@section('title', 'Akomodasi Wisata | ' . $akomodasi->nama)


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
                <h3 class="text-3xl leading-normal tracking-wider font-semibold text-white">{{ $akomodasi->nama }}</h3>
            </div>
        </div>
        <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
            <ul class="tracking-[0.5px] mb-0 inline-block">
                <li
                    class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white">
                    <a href="{{ url('/akomodasi') }}">Akomodasi Wisata</a>
                </li>
                <li class="inline-block text-base text-white/50 mx-0.5"><i class="mdi mdi-chevron-right"></i></li>
                <li class="inline-block uppercase text-[13px] font-bold text-white" aria-current="page">
                    {{ $akomodasi->nama }}</li>
            </ul>
        </div>
    </section>
    <!-- End Hero -->

    <!-- Start -->
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-6">
                <div class="lg:col-span-8 md:col-span-7">

                    {{-- Galeri --}}
                    <div data-aos="zoom-in" class="grid grid-cols-12 gap-4">
                        @foreach ($akomodasi->images as $key => $img)
                            @php
                                $colSpan = '';
                                if ($key == 0 || $key == 3) {
                                    $colSpan = 'md:col-span-8 col-span-7';
                                } elseif ($key == 1 || $key == 2) {
                                    $colSpan = 'md:col-span-4 col-span-5';
                                } else {
                                    $colSpan = 'md:col-span-4 col-span-5';
                                }
                            @endphp

                            @if ($key < 4)
                                {{-- Tampilkan hanya 4 gambar pertama --}}
                                <div class="{{ $colSpan }}">
                                    <div class="group relative overflow-hidden rounded shadow-sm dark:shadow-gray-800">
                                        <img src="{{ asset('storage/' . $img->image) }}"
                                            class="w-full lg:h-60 md:h-44 h-48 object-cover" alt="{{ $akomodasi->nama }}">
                                        <div class="absolute inset-0 group-hover:bg-slate-900/70 duration-500 ease-in-out">
                                        </div>
                                        <div
                                            class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center opacity-0 group-hover:opacity-100 duration-500">
                                            <a href="{{ asset('storage/' . $img->image) }}"
                                                class="inline-flex justify-center items-center size-9 bg-red-500 text-white rounded-full lightbox">
                                                <i data-feather="camera" class="size-4 align-middle"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    {{-- Sisanya untuk lightbox saja --}}
                    @foreach ($akomodasi->images as $key => $img)
                        @if ($key >= 4)
                            <a href="{{ asset('storage/' . $img->image) }}" class="hidden lightbox"></a>
                        @endif
                    @endforeach


                    {{-- Info --}}
                    <h5 class="text-2xl font-semibold mt-5">{{ $akomodasi->nama }}</h5>
                    <p class="flex items-center text-slate-400 font-medium mt-2">
                        <i data-feather="map-pin" class="text-red-500 size-4 me-1"></i> {{ $akomodasi->alamat }}
                    </p>

                    <ul class="list-none">
                        <li class="inline-flex items-center me-5 mt-5">
                            <i data-feather="activity" class="size-6 stroke-[1.5] text-red-500"></i>
                            <div class="ms-3">
                                <p class="font-medium">Tipe</p>
                                <span
                                    class="text-slate-400 font-medium text-sm">{{ $akomodasi->tipe ?? 'Hotel / Homestay' }}</span>
                            </div>
                        </li>

                        <li class="inline-flex items-center me-5 mt-5">
                            <i data-feather="users" class="size-6 stroke-[1.5] text-red-500"></i>
                            <div class="ms-3">
                                <p class="font-medium">Kapasitas:</p>
                                <span
                                    class="text-slate-400 font-medium text-sm">{{ $akomodasi->kapasitas ?? 'Max 10 Orang' }}</span>
                            </div>
                        </li>

                        <li class="inline-flex items-center me-5 mt-5">
                            <i data-feather="globe" class="size-6 stroke-[1.5] text-red-500"></i>
                            <div class="ms-3">
                                <p class="font-medium">Bahasa</p>
                                <span
                                    class="text-slate-400 font-medium text-sm">{{ $akomodasi->bahasa ?? 'Indonesia / English' }}</span>
                            </div>
                        </li>

                        <li class="inline-flex items-center me-5 mt-5">
                            <i data-feather="dollar-sign" class="size-6 stroke-[1.5] text-red-500"></i>
                            <div class="ms-3">
                                <p class="font-medium">Rp {{ number_format($akomodasi->harga_mulai, 0, ',', '.') }}</p>
                                <span class="text-slate-400 font-medium text-sm">Per Malam</span>
                            </div>
                        </li>
                    </ul>

                    {{-- Deskripsi --}}
                    <div class="mt-6">
                        <h5 class="text-lg font-semibold">Deskripsi:</h5>
                        <div class="text-base editor-content p-4">
                            {!! $akomodasi->deskripsi !!}
                        </div>
                    </div>

                    @if ($akomodasi->kontak)
                        @php
                            // Pastikan nomor telepon diawali dengan 62 (untuk WhatsApp)
                            $kontak = preg_replace('/^0/', '62', $akomodasi->kontak);
                            // Link WhatsApp
                            $waLink = 'https://wa.me/' . preg_replace('/[^0-9]/', '', $kontak);
                        @endphp
                        <div class="mt-6">
                            <a href="{{ $waLink }}" target="_blank"
                                class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md w-full">
                                Booking Sekarang
                            </a>
                        </div>
                    @else
                        <div class="mt-6">
                            <button disabled
                                class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-gray-400 text-white rounded-md w-full cursor-not-allowed">
                                Kontak tidak tersedia
                            </button>
                        </div>
                    @endif

                </div>

                {{-- Sidebar --}}
                <div class="lg:col-span-4 md:col-span-5">
                    <div class="p-4 rounded-md shadow-sm dark:shadow-gray-700 sticky top-20">
                        <h5 class="text-lg font-medium">{{ $akomodasi->nama }}</h5>

                        <div class="mt-4">
                            <div class="mt-2 rounded-lg overflow-hidden">
                                <iframe src="https://www.google.com/maps?q={{ urlencode($akomodasi->nama) }}&output=embed"
                                    class="w-full h-[300px]" style="border:0" allowfullscreen loading="lazy">
                                </iframe>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="https://www.google.com/maps/dir/?api=1&destination={{ urlencode($akomodasi->nama) }}"
                                target="_blank"
                                class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md w-full hover:bg-red-600 transition">
                                Arahkan ke {{ $akomodasi->nama }}
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div><!--end container-->
    </section><!--end section-->

@endsection
