@extends('layouts.appAdmin')

@section('title', 'Detail Operator Tur & Selam: ' . $penyediaTur->nama)

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
                        <a href="{{ route('admin.penyedia-tur.index') }}" class="hover:text-gray-700">Operator Tur & Selam</a>
                        <span class="text-gray-400">›</span>
                        <span class="text-gray-900 font-semibold">{{ $penyediaTur->nama }}</span>
                    </div>
                </nav>
                <h5 class="text-lg font-semibold mt-3 mb-3">Detail Operator Tur & Selam</h5>
            </div>
        </div>

        <div class="card-body p-24">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-8 col-lg-10">
                    <div class="card border">
                        <div class="card-body">

                            {{-- Thumbnail --}}
                            <div class="mb-20">
                                <label class="form-label fw-bold text-neutral-900">Gambar</label>
                                @if ($penyediaTur->image)
                                    <div class="d-flex justify-content-center">
                                        <img src="{{ asset('storage/' . $penyediaTur->image) }}"
                                            alt="{{ $penyediaTur->nama }}" class="radius-12 border"
                                            style="max-width: 300px; height: auto;">
                                    </div>
                                @else
                                    <p class="text-secondary-light">Belum ada thumbnail untuk penyedia tur ini.</p>
                                @endif
                            </div>

                            {{-- Nama Penyedia --}}
                            <div class="mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Nama Operator</label>
                                <div class="border p-3 radius-8 bg-light">{{ $penyediaTur->nama }}</div>
                            </div>

                            {{-- Jenis --}}
                            <div class="mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Jenis</label>
                                <div class="border p-3 radius-8 bg-light text-capitalize">{{ $penyediaTur->jenis }}</div>
                            </div>

                            {{-- Lokasi --}}
                            <div class="mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Lokasi</label>
                                <div class="border p-3 radius-8 bg-light">{{ $penyediaTur->lokasi ?? '-' }}</div>
                            </div>

                            {{-- Alamat --}}
                            <div class="mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Alamat</label>
                                <div class="border p-3 radius-8 bg-light">{{ $penyediaTur->alamat ?? '-' }}</div>
                            </div>

                            {{-- Nomor Kontak --}}
                            <div class="mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Nomor Kontak</label>
                                <div class="border p-3 radius-8 bg-light">{{ $penyediaTur->nomor ?? '-' }}</div>
                            </div>

                            {{-- Email --}}
                            <div class="mb-20">
                                <label class="form-label fw-semibold text-primary-light text-sm mb-8">Email</label>
                                <div class="border p-3 radius-8 bg-light">{{ $penyediaTur->email ?? '-' }}</div>
                            </div>

                            {{-- Tombol Kembali --}}
                            <div class="d-flex align-items-center justify-content-center mt-3">
                                <a href="{{ route('admin.penyedia-tur.index') }}"
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
