@extends('layouts.appAdmin')

@section('title', 'Detail Akomodasi: ' . $akomodasi->nama)


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
            {{-- Breadcrumb + Judul --}}
            <div class="d-flex flex-column">
                <nav class="text-sm mb-1">
                    <div class="d-flex align-items-center gap-1 text-gray-500">
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-gray-700">Dashboard</a>
                        <span class="text-gray-400">›</span>
                        <a href="{{ route('admin.akomodasi.index') }}" class="hover:text-gray-700">Akomodasi Wisata</a>
                        <span class="text-gray-400">›</span>
                        <span class="text-gray-900 font-semibold">{{ $akomodasi->nama }}</span>
                    </div>
                </nav>
                <h5 class="text-lg font-semibold mt-3 mb-3">Detail Akomodasi</h5>
            </div>
        </div>

        <div class="card-body p-24">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-8 col-lg-10">
                    <div class="card border">
                        <div class="card-body">

                            {{-- Galeri Gambar --}}
                            <div class="mb-20">
                                <label class="form-label fw-bold text-neutral-900">Galeri Akomodasi</label>
                                <div class="gallery-grid">
                                    @forelse($akomodasi->images as $img)
                                        <img src="{{ asset('storage/' . $img->image) }}" alt="{{ $akomodasi->nama }}">
                                    @empty
                                        <p class="text-secondary-light">Belum ada gambar untuk akomodasi ini.</p>
                                    @endforelse
                                </div>
                            </div>

                            {{-- Nama Akomodasi --}}
                            <div class="mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Nama Akomodasi</label>
                                <div class="border p-3 radius-8 bg-light">{{ $akomodasi->nama }}</div>
                            </div>

                            {{-- Lokasi --}}
                            <div class="mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Lokasi</label>
                                <div class="border p-3 radius-8 bg-light">{{ $akomodasi->lokasi }}</div>
                            </div>

                            {{-- Alamat --}}
                            <div class="mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Alamat</label>
                                <div class="border p-3 radius-8 bg-light">{{ $akomodasi->alamat ?? '-' }}</div>
                            </div>

                            {{-- Harga Mulai --}}
                            <div class="mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Harga Mulai
                                    (Rp)</label>
                                <div class="border p-3 radius-8 bg-light">Rp
                                    {{ number_format($akomodasi->harga_mulai, 0, ',', '.') }} / malam</div>
                            </div>

                            {{-- Kontak --}}
                            <div class="mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Kontak</label>
                                <div class="border p-3 radius-8 bg-light">{{ $akomodasi->kontak ?? '-' }}</div>
                            </div>

                            {{-- Deskripsi --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Deskripsi Akomodasi
                                </label>
                                <div class="editor-content text-secondary-light mt-3 border p-3 radius-8 ">
                                    {!! $akomodasi->deskripsi !!}
                                </div>
                            </div>

                            {{-- Tombol Kembali --}}
                            <div class="d-flex align-items-center justify-content-center mt-3">
                                <a href="{{ route('admin.akomodasi.index') }}"
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
