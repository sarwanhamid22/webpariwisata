@extends('layouts.app')

@section('title', 'Operator Wisata | ' . $penyediaTurs->nama)

@section('head')
    <style>
        .img-wrapper {
            width: 100%;
            height: 720px;
            /* default untuk desktop */
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            position: relative;
            background: #f0f0f0;
        }

        .img-show {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
            transition: transform 0.4s ease;
        }

        .img-wrapper:hover .img-show {
            transform: scale(1.05);
        }

        /* 🔥 Tambahan untuk mobile (maks 768px) */
        @media (max-width: 768px) {
            .img-wrapper {
                height: 400px;
                /* lebih kecil agar muat di layar mobile */
            }
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
                <h3 class="text-3xl leading-normal tracking-wider font-semibold text-white">{{ $penyediaTurs->nama }}</h3>
            </div>
        </div>
        <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
            <ul class="tracking-[0.5px] mb-0 inline-block">
                <li
                    class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white">
                    <a href="{{ url('/penyedia-tur') }}">penyediaTur Tur & Selam</a>
                </li>
                <li class="inline-block text-base text-white/50 mx-0.5"><i class="mdi mdi-chevron-right"></i></li>
                <li class="inline-block uppercase text-[13px] font-bold text-white" aria-current="page">
                    {{ $penyediaTurs->nama }}</li>
            </ul>
        </div>
    </section>
    <!-- End Hero -->

    <!-- Start Detail -->
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="flex justify-center">
                <div class="w-full max-w-2xl">
                    <!-- Gambar -->
                    <div data-aos="zoom-in" class="img-wrapper mb-6 ">
                        <img src="{{ $penyediaTurs->image ? asset('storage/' . $penyediaTurs->image) : asset('assets/images/listing/1.jpg') }}"
                            alt="{{ $penyediaTurs->nama }}" class="img-show">
                    </div>


                    <!-- Detail Info -->
                    <h5 class="text-2xl font-semibold mt-5 text-center">
                        {{ $penyediaTurs->nama }}
                    </h5>
                    <p class="flex items-center justify-center text-slate-400 font-medium mt-2">
                        <i data-feather="map-pin" class="text-red-500 size-4 me-1"></i>
                        {{ $penyediaTurs->lokasi ?? 'Lokasi tidak tersedia' }}
                    </p>

                    <!-- List Info (sejajar dengan nama PT) -->
                    <div class="mt-6 w-full flex justify-center">
                        <ul class="flex flex-col gap-4 w-full max-w-md">
                            <!-- Jenis -->
                            <li class="flex items-center">
                                <i data-feather="compass" class="size-6 stroke-[1.5] text-red-500"></i>
                                <div class="ms-3">
                                    <p class="font-medium text-sm">Jenis</p>
                                    <span class="text-slate-400 font-medium text-sm">
                                        {{ ucfirst($penyediaTurs->jenis) ?? '-' }}
                                    </span>
                                </div>
                            </li>

                            <!-- Alamat -->
                            <li class="flex items-center">
                                <i data-feather="map" class="size-6 stroke-[1.5] text-red-500"></i>
                                <div class="ms-3">
                                    <p class="font-medium text-sm">Alamat</p>
                                    <span class="text-slate-400 font-medium text-sm">
                                        {{ $penyediaTurs->alamat ?? '-' }}
                                    </span>
                                </div>
                            </li>

                            <!-- Nomor Kontak -->
                            <li class="flex items-center">
                                <i data-feather="phone" class="size-6 stroke-[1.5] text-red-500"></i>
                                <div class="ms-3">
                                    <p class="font-medium text-sm">Nomor Kontak</p>
                                    <span class="text-slate-400 font-medium text-sm">
                                        {{ $penyediaTurs->nomor ?? 'Tidak tersedia' }}
                                    </span>
                                </div>
                            </li>

                            <!-- Email -->
                            <li class="flex items-center">
                                <i data-feather="mail" class="size-6 stroke-[1.5] text-red-500"></i>
                                <div class="ms-3">
                                    <p class="font-medium text-sm">Email</p>
                                    <span class="text-slate-400 font-medium text-sm">
                                        {{ $penyediaTurs->email ?? 'Tidak tersedia' }}
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Tombol -->
                    <div class="mt-6 flex justify-center">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $penyediaTurs->nomor) }}" target="_blank"
                            class="py-2 px-6 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                            Hubungi Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </section>
    <!-- End Detail -->



@endsection
