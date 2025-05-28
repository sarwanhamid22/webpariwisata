@extends('layouts.appAdmin')

@section('title', 'Detail Akomodasi: ' . $destinasi->title)


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

    <div class="card h-100 p-0 radius-12">
        <div
            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap justify-content-between gap-3">
            {{-- Kiri: Breadcrumb + Judul --}}
            <div class="d-flex flex-column">
                <nav class="text-sm mb-1">
                    <div class="d-flex align-items-center gap-1 text-gray-500">
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-gray-700">Dashboard</a>
                        <span class="text-gray-400">›</span>
                        <a href="{{ route('admin.destinasi.index') }}" class="hover:text-gray-700">Destinasi Wisata</a>
                        <span class="text-gray-400">›</span>
                        <span class="text-gray-900 font-semibold">Detail</span>
                    </div>
                </nav>
                <h5 class="text-lg font-semibold mt-3 mb-3">Detail Destinasi Wisata</h5>
            </div>
        </div>


        <div class="card-body p-24">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-8 col-lg-10">
                    <div class="card border">
                        <div class="card-body">

                            {{-- Thumbnail --}}
                            <div class="mb-20 text-center">
                                <label class="form-label fw-bold text-neutral-900">Thumbnail</label>
                                <div class="mt-3">
                                    <img src="{{ asset('storage/' . $destinasi->image) }}" alt="{{ $destinasi->title }}"
                                        class="rounded radius-8 w-100 h-160-px object-fit-cover">
                                </div>
                            </div>

                            {{-- Nama Destinasi --}}
                            <div class="mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Nama Destinasi</label>
                                <input type="text" class="form-control radius-8" value="{{ $destinasi->title }}"
                                    readonly>
                            </div>

                            {{-- Lokasi --}}
                            <div class="mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Lokasi</label>
                                <input type="text" class="form-control radius-8" value="{{ $destinasi->location }}"
                                    readonly>
                            </div>

                            {{-- Gambar VR --}}
                            <div class="mb-20 text-center">
                                <label class="form-label fw-bold text-neutral-900">Gambar 360° (VR)</label>
                                <div class="mt-4 flex flex-wrap justify-center gap-4">
                                    @php
                                        $vrImages = json_decode($destinasi->vr_link, true);
                                    @endphp

                                    @if (!empty($vrImages))
                                        @foreach ($vrImages as $vrImage)
                                            <div class="w-60 h-40 overflow-hidden rounded-md border">
                                                <img src="{{ asset('storage/' . $vrImage) }}" alt="VR Image"
                                                    class="object-cover w-full h-full">
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-slate-400">Belum ada gambar VR yang diunggah.</p>
                                    @endif
                                </div>
                            </div>

                            {{-- Deskripsi --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Deskripsi Destinasi
                                </label>
                                <div class="editor-content text-secondary-light mt-3 border p-3 radius-8 ">
                                    {!! $destinasi->description !!}
                                </div>
                            </div>


                            {{-- Tombol Kembali --}}
                            <div class="d-flex align-items-center justify-content-center mt-3">
                                <a href="{{ route('admin.destinasi.index') }}"
                                    class="btn btn-secondary text-md px-56 py-12 radius-8">
                                    Kembali ke Daftar
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
