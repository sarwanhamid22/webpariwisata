@extends('layouts.app')

@section('title', 'Tentang Wakatobi')

@section('head')
    <style>
        .tentang-section {
            max-width: 800px;
            margin: 0 auto;
            padding-top: 2rem;
            /* atas tetap */
            padding-bottom: 6rem;
            /* bawah 96px */
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .tentang-section h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #0f172a;
            text-align: center;
        }

        .tentang-section h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-top: 2rem;
            color: #1e293b;
        }

        .tentang-section p {
            margin-top: 0.75rem;
            line-height: 1.8;
            color: #334155;
            text-align: justify;
        }

        .tentang-highlight {
            background-color: #f1f5f9;
            border-left: 4px solid #2563eb;
            padding: 1rem;
            margin: 2rem 0;
            color: #1e40af;
            font-size: 0.95rem;
        }

        .galeri-section {
            max-width: 1100px;
            margin: 0 auto 2rem;
            padding-top: 6rem;
            /* atas 96px */
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .galeri-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #0f172a;
        }

        @media (max-width: 768px) {
            .tentang-section {
                padding-top: 2rem;
                padding-bottom: 6rem;
                /* tetap 96px bawah */
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .galeri-section {
                padding-top: 6rem;
                /* tetap 96px atas */
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }
    </style>
@endsection


@section('content')

    <!-- Hero -->
    <section
        class="relative table w-full items-center py-36 bg-[url('../../assets/images/bg/cta.jpg')] bg-top bg-no-repeat bg-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 text-center mt-10">
                <h3 class="text-4xl font-semibold text-white">Tentang Wakatobi</h3>
            </div>
        </div>

        <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
            <ul class="tracking-[0.5px] mb-0 inline-block">
                <li class="inline-block uppercase text-[13px] font-bold text-white/50 hover:text-white">
                    <a href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="inline-block text-base text-white/50 mx-0.5">
                    <i class="mdi mdi-chevron-right"></i>
                </li>
                <li class="inline-block uppercase text-[13px] font-bold text-white" aria-current="page">
                    Tentang Wakatobi
                </li>
            </ul>
        </div>
    </section>

    <!-- Galeri -->
    <section class="galeri-section">
        {{-- Galeri --}}
        <div data-aos="zoom-in" class="grid grid-cols-12 gap-4">
            @foreach (range(1, 4) as $key)
                @php
                    $colSpan = '';
                    if ($key === 1 || $key === 4) {
                        $colSpan = 'md:col-span-8 col-span-7';
                    } elseif ($key === 2 || $key === 3) {
                        $colSpan = 'md:col-span-4 col-span-5';
                    } else {
                        $colSpan = 'md:col-span-4 col-span-5';
                    }

                    $imagePath = 'assets/images/tentangkami/gambar' . $key . '.jpg';
                @endphp

                <div class="{{ $colSpan }}">
                    <div class="group relative overflow-hidden rounded shadow-sm dark:shadow-gray-800">
                        <img src="{{ asset($imagePath) }}" class="w-full lg:h-60 md:h-44 h-48 object-cover"
                            alt="Galeri Wakatobi {{ $key }}">
                        <div class="absolute inset-0 group-hover:bg-slate-900/70 duration-500 ease-in-out"></div>
                        <div
                            class="absolute top-1/2 -translate-y-1/2 start-0 end-0 text-center opacity-0 group-hover:opacity-100 duration-500">
                            <a href="{{ asset($imagePath) }}"
                                class="inline-flex justify-center items-center size-9 bg-red-500 text-white rounded-full lightbox">
                                <i data-feather="camera" class="size-4 align-middle"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Sisanya untuk lightbox saja --}}
        @foreach (range(5, 8) as $i)
            <a href="{{ asset('assets/images/tentangkami/gambar' . ($i <= 4 ? $i : 4) . '.jpg') }}"
                class="hidden lightbox"></a>
        @endforeach

    </section>

    <!-- Konten Utama -->
    <section class="tentang-section">
        <h2>Wakatobi: Surga Bahari Dunia di Sulawesi Tenggara</h2>

        <p>
            <strong>Wakatobi</strong> adalah kabupaten kepulauan di Provinsi Sulawesi Tenggara yang dikenal sebagai
            destinasi wisata bahari kelas dunia. Nama Wakatobi merupakan singkatan dari empat pulau utama:
            <strong>Wangi-Wangi</strong>, <strong>Kaledupa</strong>, <strong>Tomia</strong>, dan <strong>Binongko</strong>.
        </p>

        <h3>📍 Letak & Geografi</h3>
        <p>
            Terletak di jantung segitiga terumbu karang dunia (Coral Triangle), Wakatobi menyimpan keanekaragaman hayati
            laut yang luar biasa. Wilayah ini terdiri dari pantai berpasir putih, laguna biru jernih, dan terumbu karang
            yang spektakuler.
        </p>

        <h3>🌊 Daya Tarik Utama</h3>
        <ul class="list-disc list-inside text-slate-600 mt-2">
            <li><strong>Diving & Snorkeling:</strong> Tersedia lebih dari 50 spot menyelam kelas dunia.</li>
            <li><strong>Budaya Lokal:</strong> Kehidupan masyarakat Suku Bajo yang tinggal di atas laut.</li>
            <li><strong>Pemandangan Alami:</strong> Pantai eksotis, gua alami, dan pemandangan sunset dari atas bukit.</li>
        </ul>

        <h3>🛬 Akses & Transportasi</h3>
        <p>
            Wakatobi dapat diakses melalui udara dan laut:
            <br><br>
            <strong>Udara:</strong> Jakarta/Surabaya → Kendari (Batik Air, Lion Air) → Wangi-Wangi (Wings Air via Bandara
            Matahora).<br>
            <strong>Laut:</strong> Kapal cepat dan kapal Pelni dari Kendari ke Pelabuhan Wanci.
        </p>

        <h3>🌤️ Waktu Terbaik untuk Berkunjung</h3>
        <p>
            Periode terbaik untuk berkunjung adalah antara <strong>April hingga November</strong>, saat cuaca cerah dan laut
            tenang, ideal untuk aktivitas bahari.
        </p>

        <div class="tentang-highlight">
            🌐 Wakatobi diakui UNESCO sebagai Cagar Biosfer Dunia sejak 2012. Taman Nasional Wakatobi seluas 1,39 juta
            hektar menjadi rumah bagi lebih dari 750 spesies koral dan ribuan biota laut lainnya.
        </div>

        <h3>📌 Fakta Menarik</h3>
        <ul class="list-disc list-inside text-slate-600 mt-2">
            <li>Memiliki 4 pulau utama dan lebih dari 100 pulau kecil.</li>
            <li>Hingga 90% jenis terumbu karang dunia ditemukan di Wakatobi.</li>
            <li>Menjadi tujuan utama para penyelam profesional dari seluruh dunia.</li>
        </ul>

        <h3>🎒 Tips Wisata</h3>
        <ul class="list-disc list-inside text-slate-600 mt-2">
            <li>Siapkan uang tunai karena ATM terbatas di luar Wangi-Wangi.</li>
            <li>Gunakan pemandu lokal saat menjelajahi pulau kecil.</li>
            <li>Hormati budaya dan adat istiadat setempat.</li>
        </ul>
    </section>

@endsection
