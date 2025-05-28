@extends('layouts.appAdmin')

@section('title', 'Edit Operator Tur & Selam: ' . $penyediaTur->nama)


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
                        <span class="text-gray-900 font-semibold">Edit</span>
                    </div>
                </nav>
                <h5 class="text-lg font-semibold mt-3 mb-3">Edit Operator Tur</h5>
            </div>
        </div>

        <div class="card-body p-24">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-8 col-lg-10">
                    <div class="card border">
                        <div class="card-body">
                            <form id="penyediaTurForm" action="{{ route('admin.penyedia-tur.update', $penyediaTur->id) }}"
                                method="POST" enctype="multipart/form-data" class="text-start">
                                @csrf
                                @method('PUT')

                                {{-- Upload Thumbnail --}}
                                <div class="mb-20">
                                    <label class="form-label fw-bold text-neutral-900">Upload Gambar</label>
                                    <div class="upload-image-wrapper">
                                        <div id="image-preview-wrapper"
                                            class="position-relative h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                            <img id="uploaded-img__preview"
                                                src="{{ asset('storage/' . $penyediaTur->image) }}"
                                                class="w-100 h-100 object-fit-cover" alt="Thumbnail">
                                        </div>

                                        <label
                                            class="upload-file h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1 mt-2"
                                            for="upload-file">
                                            <iconify-icon icon="solar:camera-outline"
                                                class="text-xl text-secondary-light"></iconify-icon>
                                            <span class="fw-semibold text-secondary-light">Upload Baru</span>
                                            <input id="upload-file" name="image" type="file" hidden
                                                accept=".jpg,.jpeg,.png">
                                        </label>
                                    </div>
                                </div>

                                {{-- Nama Penyedia --}}
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Nama
                                        Operator</label>
                                    <input type="text" name="nama" id="nama" class="form-control radius-8"
                                        value="{{ old('nama', $penyediaTur->nama) }}" required>
                                </div>

                                {{-- Jenis --}}
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Jenis</label>
                                    <select name="jenis" id="jenis" class="form-control radius-8" required>
                                        <option value="tour"
                                            {{ old('jenis', $penyediaTur->jenis) === 'tour' ? 'selected' : '' }}>Tour
                                        </option>
                                        <option value="dive"
                                            {{ old('jenis', $penyediaTur->jenis) === 'dive' ? 'selected' : '' }}>Dive
                                        </option>
                                    </select>
                                </div>

                                {{-- Lokasi --}}
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Lokasi</label>
                                    <input type="text" name="lokasi" id="lokasi" class="form-control radius-8"
                                        value="{{ old('lokasi', $penyediaTur->lokasi) }}">
                                </div>

                                {{-- Alamat --}}
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control radius-8" rows="3">{{ old('alamat', $penyediaTur->alamat) }}</textarea>
                                </div>

                                {{-- Nomor Kontak --}}
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Nomor
                                        Kontak</label>
                                    <input type="text" name="nomor" id="nomor" class="form-control radius-8"
                                        value="{{ old('nomor', $penyediaTur->nomor) }}">
                                </div>

                                {{-- Email --}}
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Email</label>
                                    <input type="email" name="email" id="email" class="form-control radius-8"
                                        value="{{ old('email', $penyediaTur->email) }}">
                                </div>

                                {{-- Tombol --}}
                                <div
                                    class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-3 mt-5">
                                    <a href="{{ route('admin.penyedia-tur.index') }}"
                                        class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8 text-decoration-none text-center w-100 w-md-auto">
                                        Batal
                                    </a>
                                    <button type="submit"
                                        class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8 w-100 w-md-auto">
                                        Update
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const uploadInput = document.getElementById('upload-file');
            const previewImage = document.getElementById('uploaded-img__preview');
            uploadInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
