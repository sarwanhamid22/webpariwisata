@extends('layouts.appAdmin')

@section('title', 'Detail Galeri: ' . $galeri->title)


@section('content')

    <div class="card h-100 p-0 radius-12">
        <div
            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div class="d-flex flex-column">
                <nav class="text-sm mb-1">
                    <div class="d-flex align-items-center gap-1 text-gray-500">
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-gray-700">Dashboard</a>
                        <span class="text-gray-400">›</span>
                        <a href="{{ route('admin.galeri.index') }}" class="hover:text-gray-700">Galeri Wisata</a>
                        <span class="text-gray-400">›</span>
                        <span class="text-gray-900 font-semibold">Detail</span>
                    </div>
                </nav>
                <h5 class="text-lg font-semibold mt-3 mb-3">Detail Galeri Wisata</h5>
            </div>
        </div>

        <div class="row justify-content-center gy-4 p-4">
            <div class="col-lg-8">
                <div class="card p-0 radius-12 overflow-hidden">

                    {{-- Status + Tombol Edit (Atas Gambar) --}}
                    <div
                        class="d-flex align-items-center justify-content-between p-3 border-bottom bg-light dark:bg-slate-800 dark:border-slate-700">
                        <div>
                            @if ($galeri->status === 'aman')
                                <span class="badge bg-success text-white px-3 py-2">Status: Aman</span>
                            @elseif ($galeri->status === 'ditahan')
                                <span class="badge bg-warning text-dark dark:text-yellow-300 px-3 py-2">Status:
                                    Ditahan</span>
                            @endif
                        </div>
                        <div>
                            <button type="button"
                                class="btn btn-sm btn-warning dark:bg-yellow-600 dark:border-0 dark:text-white"
                                data-bs-toggle="modal" data-bs-target="#editStatusModal">
                                Edit Status
                            </button>
                        </div>
                    </div>

                    {{-- Gambar --}}
                    <div>
                        <img src="{{ asset('storage/' . $galeri->image) }}" alt="Galeri Image"
                            class="w-100 object-fit-cover" style="max-height:400px; object-fit: cover;">
                    </div>

                    <div class="p-32">

                        {{-- Header User + Meta --}}
                        <div class="memoar-header d-flex flex-column flex-md-row justify-content-between gap-3 mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <h6 class="text-lg mb-0 text-neutral-600 dark:text-slate-200">
                                    by <span
                                        class="fw-semibold text-primary-light dark:text-primary-300">{{ $galeri->user->name ?? '-' }}</span>
                                </h6>
                            </div>

                            <div
                                class="d-flex flex-column flex-md-row gap-2 gap-md-4 text-sm text-primary-light dark:text-primary-300">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="ri-map-pin-line"></i>
                                    <span>{{ $galeri->title }}</span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="ri-calendar-2-line"></i>
                                    <span>{{ $galeri->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Caption atau Info Tambahan (opsional) --}}
                        @if (!empty($galeri->caption))
                            <div class="mt-4 text-primary-light dark:text-slate-300">
                                <p>{{ $galeri->caption }}</p>
                            </div>
                        @endif

                        {{-- Tombol Kembali --}}
                        <div class="d-flex align-items-center justify-content-center mt-4">
                            <a href="{{ route('admin.galeri.index') }}"
                                class="btn btn-secondary text-md px-56 py-12 radius-8">
                                Kembali ke Daftar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL Edit Status --}}
    <div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content radius-12">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStatusModalLabel">Edit Status & Catatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('admin.galeri.updateStatus', $galeri->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status Galeri</label>
                            <select name="status" id="status" class="form-select">
                                <option value="aman" {{ $galeri->status === 'aman' ? 'selected' : '' }}>Aman</option>
                                <option value="ditahan" {{ $galeri->status === 'ditahan' ? 'selected' : '' }}>Ditahan
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="catatan_admin" class="form-label">Catatan Admin</label>
                            <textarea name="catatan_admin" id="catatan_admin" rows="4" class="form-control">{{ old('catatan_admin', $galeri->catatan_admin) }}</textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
