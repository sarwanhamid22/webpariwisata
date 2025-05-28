@extends('layouts.appAdmin')

@section('title', 'Dashboard')

@section('content')

<div class="row gy-4">

    {{-- Kolom Kiri: Statistik + Hero Slide --}}
    <div class="col-xxl-8">
        <div class="row gy-4">

            {{-- Total Pengguna --}}
            <div class="col-xxl-4 col-sm-6">
                <div class="card p-3 shadow-2 radius-8 border input-form-light h-100 bg-gradient-end-1">
                    <div class="card-body p-0">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                            <div class="d-flex align-items-center gap-2">
                                <span class="mb-0 w-48-px h-48-px bg-primary-600 text-white d-flex justify-content-center align-items-center rounded-circle h6">
                                    <iconify-icon icon="mdi:account-group" class="icon"></iconify-icon>
                                </span>
                                <div>
                                    <span class="mb-2 fw-medium text-secondary-light text-sm">Total Users</span>
                                    <h6 class="fw-semibold">{{ $totalUsers }}</h6>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm mb-0 text-muted">Pengguna yang telah mendaftar</p>
                    </div>
                </div>
            </div>

            {{-- Total Memoar --}}
            <div class="col-xxl-4 col-sm-6">
                <div class="card p-3 shadow-2 radius-8 border input-form-light h-100 bg-gradient-end-2">
                    <div class="card-body p-0">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                            <div class="d-flex align-items-center gap-2">
                                <span class="mb-0 w-48-px h-48-px bg-success-main text-white d-flex justify-content-center align-items-center rounded-circle h6">
                                    <iconify-icon icon="ri:article-line" class="icon"></iconify-icon>
                                </span>
                                <div>
                                    <span class="mb-2 fw-medium text-secondary-light text-sm">Memoar Wisata</span>
                                    <h6 class="fw-semibold">{{ $totalMemoars }}</h6>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm mb-0 text-muted">Memoar wisata yang dipublikasikan</p>
                    </div>
                </div>
            </div>

            {{-- Total Galeri --}}
            <div class="col-xxl-4 col-sm-6">
                <div class="card p-3 shadow-2 radius-8 border input-form-light h-100 bg-gradient-end-3">
                    <div class="card-body p-0">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                            <div class="d-flex align-items-center gap-2">
                                <span class="mb-0 w-48-px h-48-px bg-warning text-white d-flex justify-content-center align-items-center rounded-circle h6">
                                    <iconify-icon icon="material-symbols:image" class="icon"></iconify-icon>
                                </span>
                                <div>
                                    <span class="mb-2 fw-medium text-secondary-light text-sm">Galeri Wisata</span>
                                    <h6 class="fw-semibold">{{ $totalGaleri }}</h6>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm mb-0 text-muted">Jumlah foto di galeri wisata</p>
                    </div>
                </div>
            </div>

            {{-- Total Destinasi --}}
            <div class="col-xxl-4 col-sm-6">
                <div class="card p-3 shadow-2 radius-8 border input-form-light h-100 bg-gradient-end-4">
                    <div class="card-body p-0">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                            <div class="d-flex align-items-center gap-2">
                                <span class="mb-0 w-48-px h-48-px bg-info text-white d-flex justify-content-center align-items-center rounded-circle h6">
                                    <iconify-icon icon="mdi:map-marker-radius" class="icon"></iconify-icon>
                                </span>
                                <div>
                                    <span class="mb-2 fw-medium text-secondary-light text-sm">Destinasi Wisata</span>
                                    <h6 class="fw-semibold">{{ $totalDestinasi }}</h6>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm mb-0 text-muted">Jumlah total destinasi wisata</p>
                    </div>
                </div>
            </div>

            {{-- Total Review --}}
            <div class="col-xxl-4 col-sm-6">
                <div class="card p-3 shadow-2 radius-8 border input-form-light h-100 bg-gradient-end-5">
                    <div class="card-body p-0">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                            <div class="d-flex align-items-center gap-2">
                                <span class="mb-0 w-48-px h-48-px bg-danger text-white d-flex justify-content-center align-items-center rounded-circle h6">
                                    <iconify-icon icon="ph:star-duotone" class="icon"></iconify-icon>
                                </span>
                                <div>
                                    <span class="mb-2 fw-medium text-secondary-light text-sm">Review Pengguna</span>
                                    <h6 class="fw-semibold">{{ $totalReviews }}</h6>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm mb-0 text-muted">Ulasan yang diberikan oleh pengguna</p>
                    </div>
                </div>
            </div>

            {{-- Total Akomodasi --}}
            <div class="col-xxl-4 col-sm-6">
                <div class="card p-3 shadow-2 radius-8 border input-form-light h-100 bg-gradient-end-6">
                    <div class="card-body p-0">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                            <div class="d-flex align-items-center gap-2">
                                <span class="mb-0 w-48-px h-48-px bg-cyan text-white d-flex justify-content-center align-items-center rounded-circle h6">
                                    <iconify-icon icon="mdi:hotel" class="icon"></iconify-icon>
                                </span>
                                <div>
                                    <span class="mb-2 fw-medium text-secondary-light text-sm">Akomodasi Wisata</span>
                                    <h6 class="fw-semibold">{{ $totalAkomodasi }}</h6>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm mb-0 text-muted">Penginapan & fasilitas yang terdaftar</p>
                    </div>
                </div>
            </div>

            {{-- Total Akomodasi --}}
            <div class="col-xxl-4 col-sm-6">
                <div class="card p-3 shadow-2 radius-8 border input-form-light h-100 bg-gradient-end-6">
                    <div class="card-body p-0">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                            <div class="d-flex align-items-center gap-2">
                                <span class="mb-0 w-48-px h-48-px bg-cyan text-white d-flex justify-content-center align-items-center rounded-circle h6">
                                    <iconify-icon icon="mdi:diving-snorkel" class="icon"></iconify-icon>
                                </span>
                                <div>
                                    <span class="mb-2 fw-medium text-secondary-light text-sm">Operator Wisata</span>
                                    <h6 class="fw-semibold">{{ $totalOperators }}</h6>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm mb-0 text-muted">Jumlah total operator wisata yang terdaftar</p>
                    </div>
                </div>
            </div>

            {{-- Hero Slide Panel (Area 2) --}}
            <div class="col-12">
                <div class="card h-100 radius-8 border-0">
                    <div class="card-header bg-base border-bottom py-16 px-24">
                        <h6 class="mb-0 fw-bold text-lg">Pengaturan Hero Beranda</h6>
                    </div>

                    <div class="card-body p-24">
                        {{-- Form Input Slide --}}
                        <div class="card border shadow-sm radius-12 mb-5">
                            <div class="card-body p-24">
                                <form method="POST" action="{{ route('admin.hero.store.multi') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Judul Slide</label>
                                        <input type="text" name="title" class="form-control form-control-sm"
                                            placeholder="Masukkan judul slide" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Subjudul Slide</label>
                                        <input name="subtitle" type="text" class="form-control form-control-sm"
                                            placeholder="Masukkan subjudul slide" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Gambar Slide 1</label>
                                        <input type="file" name="images[]" class="form-control form-control-sm"
                                            accept="image/*" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Gambar Slide 2</label>
                                        <input type="file" name="images[]" class="form-control form-control-sm"
                                            accept="image/*" required>
                                    </div>

                                    <div class="form-check form-switch mb-4">
                                        <input class="form-check-input" type="checkbox" id="isActive" name="is_active" value="1" checked>
                                        <label class="form-check-label text-sm" for="isActive">Tampilkan slide ini</label>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 btn-sm">Simpan Slide</button>
                                </form>
                            </div>
                        </div>

                        {{-- Preview Slide Aktif --}}
                        <div class="card border shadow-sm radius-12">
                            <div class="card-body p-24">
                                <h6 class="fw-bold text-lg mb-3">Preview Hero Slide Aktif</h6>

                                @if ($heroSlides->count())
                                    <div class="mb-3">
                                        <h6 class="fw-bold mb-1 text-md">{{ $heroSlides->first()->title }}</h6>
                                        <p class="text-muted mb-3 text-sm">{{ $heroSlides->first()->subtitle }}</p>
                                    </div>

                                    <div class="d-flex flex-wrap gap-3 mb-3 mt-3">
                                        @foreach ($heroSlides as $slide)
                                            <div class="border rounded overflow-hidden shadow-sm" style="width: 100px; height: 80px;">
                                                <img src="{{ asset('storage/' . $slide->image) }}" alt="Hero Image"
                                                    class="img-fluid h-100 w-100 object-fit-cover">
                                            </div>
                                        @endforeach
                                    </div>

                                <form method="POST" action="{{ route('admin.hero.destroy', $heroSlides->first()->group_id) }}" class="form-hapus-slide">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger w-100 btn-sm">Hapus Slide</button>
                                </form>

                                @else
                                    <p class="text-secondary-light text-sm">Belum ada slide aktif.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> {{-- row gy-4 end --}}
    </div>

    {{-- Kolom Kanan: Statistik Kunjungan Destinasi (Area 3) --}}
    <div class="col-xxl-4">
        <div class="card radius-8 border">
            <div class="card-body p-24">
                <h6 class="fw-bold text-lg mb-3">Laporan Trafik Destinasi</h6>

                {{-- Total Visitor dalam Card Mini --}}
                <div class="card p-3 shadow-sm radius-8 border input-form-light bg-primary-light mb-3">
                    <div class="card-body p-0">
                        <div class="d-flex align-items-center gap-3">
                            <div class="w-60-px h-60-px bg-primary text-white rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="material-symbols:map-outline" class="text-2xl"></iconify-icon>
                            </div>
                            <div>
                                <p class="text-sm text-dark fw-medium mb-1">Total Visitor Destinasi</p>
                                <h5 class="fw-bold text-dark mb-0">{{ number_format($totalKunjunganDestinasi) }} kali</h5>
                                <p class="text-xs text-muted mt-1 mb-0">Jumlah total visitor halaman destinasi</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Top 5 Destinasi --}}
                <h6 class="fw-bold text-lg mb-1">Destinasi Wisata Terpopuler</h6>

                @if ($topDestinasiByVisit->isEmpty())
                    <p class="text-secondary-light">Belum ada kunjungan yang tercatat.</p>
                @else
                    <ul class="list-group list-group-flush">
                        @foreach ($topDestinasiByVisit as $destinasi)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="d-flex align-items-start">
                                    <iconify-icon icon="mdi:map-marker" class="text-danger me-2 mt-1"></iconify-icon>
                                    <span class="fw-medium text-sm text-dark">{{ $destinasi->location }}</span>
                                </span>
                                <span class="badge bg-primary rounded-circle text-white d-flex justify-content-center align-items-center" style="width: 32px; height: 32px;">
                                    {{ visits($destinasi)->count() }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

</div> {{-- row gy-4 end --}}

@endsection
