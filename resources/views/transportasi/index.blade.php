@extends('layouts.app')

@section('title', 'Transportasi Wisata')

@section('head')
    <style>
        .transportasi-section {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .transportasi-table {
            width: 100%;
            max-width: 900px;
            border-collapse: collapse;
            margin: 0 auto 2rem auto;
        }

        .transportasi-table th,
        .transportasi-table td {
            border: 1px solid #e5e7eb;
            padding: 12px;
            text-align: left;
            white-space: nowrap;
        }

        .transportasi-table th {
            background-color: #f3f4f6;
            font-weight: 600;
        }

        .transportasi-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 2rem 0 1rem;
            text-align: center;
        }

        .transportasi-alert {
            width: 100%;
            border: 2px solid #dc2626;
            color: #dc2626;
            padding: 1rem;
            border-radius: 0.5rem;
            text-align: center;
            margin: 0 auto 2rem auto;
            background-color: #fef2f2;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .transportasi-table {
                display: block;
                overflow-x: auto;
                width: 100%;
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
                <h3 class="text-4xl leading-normal tracking-wider font-semibold text-white">Temukan Transportasi Wisata</h3>
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
                    Transportasi Wisata
                </li>
            </ul>
        </div>
    </section>
    <!-- End Hero -->

    <!-- Start Transportasi Section -->
    <section class="relative md:py-24 py-16">
        <div class="container relative transportasi-section">

            {{-- Pesan Pembuka --}}
            <div class="transportasi-alert">
                Semua jadwal dapat berubah sewaktu-waktu mengikuti dinamika di Wakatobi. Silakan konfirmasi dengan akomodasi
                Anda untuk pembaruan harian.
            </div>

            {{-- Transportasi Udara --}}
            <div class="w-full">
                <h4 class="transportasi-title">✈️ Akses Udara ke Wakatobi</h4>
                <table class="transportasi-table">
                    <thead>
                        <tr>
                            <th>Rute Penerbangan</th>
                            <th>Maskapai</th>
                            <th>Jadwal</th>
                            <th>Harga (Estimasi)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jakarta → Kendari</td>
                            <td>Batik Air, Lion Air, Citilink</td>
                            <td>Setiap hari</td>
                            <td>Rp1.200.000 – Rp2.000.000</td>
                        </tr>
                        <tr>
                            <td>Surabaya → Kendari</td>
                            <td>Lion Air, Citilink</td>
                            <td>Setiap hari</td>
                            <td>Rp1.000.000 – Rp1.800.000</td>
                        </tr>
                        <tr>
                            <td>Makassar → Kendari</td>
                            <td>Wings Air, Citilink</td>
                            <td>Setiap hari</td>
                            <td>Rp700.000 – Rp1.200.000</td>
                        </tr>
                        <tr>
                            <td>Kendari → Wakatobi</td>
                            <td>Wings Air</td>
                            <td>Setiap hari</td>
                            <td>Rp400.000 – Rp700.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Transportasi Laut --}}
            <div class="w-full">
                <h4 class="transportasi-title">🚢 Akses Laut: Kendari ke Wangi-Wangi</h4>
                <table class="transportasi-table">
                    <thead>
                        <tr>
                            <th>Nama Kapal</th>
                            <th>Jadwal</th>
                            <th>Durasi</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>KFC Jetliner (Pelni)</td>
                            <td>Selasa, Kamis, Sabtu (09.00)</td>
                            <td>±10 jam</td>
                            <td>Rp86.000</td>
                        </tr>
                        <tr>
                            <td>KM Aksar Saputra</td>
                            <td>Senin – Kamis</td>
                            <td>±10 jam</td>
                            <td>Rp200.000</td>
                        </tr>
                        <tr>
                            <td>KM Al Sudais</td>
                            <td>Jumat – Minggu</td>
                            <td>±10 jam</td>
                            <td>Rp200.000</td>
                        </tr>
                        <tr>
                            <td>KM Napoleon</td>
                            <td>Jadwal berkala</td>
                            <td>±10 jam</td>
                            <td>Rp200.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Antar Pulau --}}
            <div class="w-full">
                <h4 class="transportasi-title">🚤 Transportasi Antar-Pulau di Wakatobi</h4>

                <h5 class="transportasi-title text-lg mt-6 mb-2">Wangi-Wangi ⇄ Kaledupa</h5>
                <table class="transportasi-table">
                    <thead>
                        <tr>
                            <th>Moda</th>
                            <th>Jadwal</th>
                            <th>Durasi</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Speed Boat</td>
                            <td>09.00 & 14.00</td>
                            <td>1–1.5 jam</td>
                            <td>Rp100.000 – Rp150.000</td>
                        </tr>
                        <tr>
                            <td>Kapal Kayu</td>
                            <td>07.00 & 15.00</td>
                            <td>±2 jam</td>
                            <td>Rp50.000 – Rp80.000</td>
                        </tr>
                        <tr>
                            <td>Feri</td>
                            <td>Jumat</td>
                            <td>±3 jam</td>
                            <td>Rp60.000</td>
                        </tr>
                    </tbody>
                </table>

                <h5 class="transportasi-title text-lg mt-6 mb-2">Kaledupa ⇄ Tomia</h5>
                <table class="transportasi-table">
                    <thead>
                        <tr>
                            <th>Moda</th>
                            <th>Jadwal</th>
                            <th>Durasi</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Speed Boat</td>
                            <td>10.00</td>
                            <td>±1 jam</td>
                            <td>Rp100.000</td>
                        </tr>
                        <tr>
                            <td>Kapal Kayu</td>
                            <td>08.00 & 14.00</td>
                            <td>±1.5 jam</td>
                            <td>Rp50.000 – Rp70.000</td>
                        </tr>
                    </tbody>
                </table>

                <h5 class="transportasi-title text-lg mt-6 mb-2">Tomia ⇄ Binongko</h5>
                <table class="transportasi-table">
                    <thead>
                        <tr>
                            <th>Moda</th>
                            <th>Jadwal</th>
                            <th>Durasi</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Speed Boat</td>
                            <td>09.00</td>
                            <td>±1 jam</td>
                            <td>Rp100.000</td>
                        </tr>
                        <tr>
                            <td>Kapal Kayu</td>
                            <td>07.00</td>
                            <td>±1.5 jam</td>
                            <td>Rp50.000 – Rp70.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Transportasi Darat --}}
            <div class="w-full">
                <h4 class="transportasi-title">🚗 Transportasi Darat di Wakatobi</h4>
                <table class="transportasi-table">
                    <thead>
                        <tr>
                            <th>Pulau</th>
                            <th>Moda</th>
                            <th>Harga Sewa/Penggunaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="3">Wangi-Wangi</td>
                            <td>Motor Sewa</td>
                            <td>Rp100.000 – Rp150.000/hari</td>
                        </tr>
                        <tr>
                            <td>Mobil Sewa</td>
                            <td>Rp500.000 – Rp700.000/hari</td>
                        </tr>
                        <tr>
                            <td>Ojek</td>
                            <td>Rp10.000 – Rp25.000/trip</td>
                        </tr>
                        <tr>
                            <td rowspan="2">Kaledupa</td>
                            <td>Motor Sewa (terbatas)</td>
                            <td>±Rp120.000/hari</td>
                        </tr>
                        <tr>
                            <td>Ojek</td>
                            <td>Rp10.000 – Rp20.000/trip</td>
                        </tr>
                        <tr>
                            <td rowspan="2">Tomia</td>
                            <td>Motor Sewa (terbatas)</td>
                            <td>±Rp120.000/hari</td>
                        </tr>
                        <tr>
                            <td>Ojek</td>
                            <td>Rp10.000 – Rp20.000/trip</td>
                        </tr>
                        <tr>
                            <td>Binongko</td>
                            <td>Ojek</td>
                            <td>Rp10.000 – Rp20.000/trip</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div><!-- end container -->
    </section>
    <!-- End Transportasi Section -->

@endsection
