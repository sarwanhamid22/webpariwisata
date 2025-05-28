@extends('layouts.appAdmin')

@section('title', 'Buat Operator Tur & Selam Baru')

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
                        <a href="{{ route('admin.penyedia-tur.index') }}" class="hover:text-gray-700">Operator Tur & Selam</a>
                        <span class="text-gray-400">›</span>
                        <span class="text-gray-900 font-semibold">Tambah</span>
                    </div>
                </nav>
                <h5 class="text-lg font-semibold mt-3 mb-3">Tambahkan Operator Tur & Selam Baru</h5>
            </div>
        </div>

        <div class="card-body p-24">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-8 col-lg-10">
                    <div class="card border">
                        <div class="card-body">
                            <form action="{{ route('admin.penyedia-tur.store') }}" method="POST"
                                enctype="multipart/form-data" class="text-start">
                                @csrf

                                {{-- Upload Thumbnail --}}
                                <div class="mb-20">
                                    <label class="form-label fw-bold text-neutral-900">Upload Gambar</label>
                                    <div class="upload-image-wrapper">
                                        <div
                                            class="uploaded-img d-none position-relative h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                            <button type="button"
                                                class="uploaded-img__remove position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex bg-danger-600 w-40-px h-40-px justify-content-center align-items-center rounded-circle">
                                                <iconify-icon icon="radix-icons:cross-2"
                                                    class="text-2xl text-white"></iconify-icon>
                                            </button>
                                            <img id="uploaded-img__preview" class="w-100 h-100 object-fit-cover"
                                                src="{{ asset('assets/images/user.png') }}" alt="image">
                                        </div>

                                        <label
                                            class="upload-file h-100-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1"
                                            for="upload-file">
                                            <iconify-icon icon="solar:camera-outline"
                                                class="text-xl text-secondary-light"></iconify-icon>
                                            <span class="fw-semibold text-secondary-light">Upload</span>
                                            <input id="upload-file" name="image" type="file" hidden
                                                accept=".jpg,.jpeg,.png">
                                        </label>
                                    </div>
                                </div>


                                {{-- Nama Penyedia --}}
                                <div class="mb-20">
                                    <label for="nama"
                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Nama Operator <span
                                            class="text-danger-600">*</span></label>
                                    <input type="text" name="nama" id="nama" class="form-control radius-8"
                                        placeholder="Nama Penyedia" required>
                                </div>

                                {{-- Jenis (Tour/Dive) --}}
                                <div class="mb-20">
                                    <label for="jenis"
                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Jenis <span
                                            class="text-danger-600">*</span></label>
                                    <select name="jenis" id="jenis" class="form-control radius-8" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        <option value="tour">Tour</option>
                                        <option value="dive">Dive</option>
                                    </select>
                                </div>

                                {{-- Lokasi --}}
                                <div class="mb-20">
                                    <label for="lokasi"
                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Lokasi</label>
                                    <input type="text" name="lokasi" id="lokasi" class="form-control radius-8"
                                        placeholder="Lokasi Penyedia">
                                </div>

                                {{-- Alamat --}}
                                <div class="mb-20">
                                    <label for="alamat"
                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Alamat</label>
                                    <input type="text" name="alamat" id="alamat" class="form-control radius-8"
                                        placeholder="Alamat Penyedia">
                                </div>

                                {{-- Nomor Kontak --}}
                                <div class="mb-20">
                                    <label for="nomor"
                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Nomor Kontak</label>
                                    <input type="text" name="nomor" id="nomor" class="form-control radius-8"
                                        placeholder="Contoh: 08123456789">
                                </div>

                                {{-- Email --}}
                                <div class="mb-20">
                                    <label for="email"
                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Email</label>
                                    <input type="email" name="email" id="email" class="form-control radius-8"
                                        placeholder="Contoh: info@wisatatour.com">
                                </div>

                                {{-- Tombol --}}
                                <div
                                    class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-3 mt-3">
                                    <a href="{{ route('admin.penyedia-tur.index') }}"
                                        class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8 text-decoration-none text-center w-100 w-md-auto">
                                        Batal
                                    </a>
                                    <button type="submit"
                                        class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8 w-100 w-md-auto">
                                        Simpan
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
            const uploadedImgWrapper = document.querySelector('.uploaded-img');
            const uploadedImgPreview = document.getElementById('uploaded-img__preview');
            const removeBtn = document.querySelector('.uploaded-img__remove');

            if (uploadInput) {
                uploadInput.addEventListener('change', function() {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            uploadedImgPreview.src = e.target.result;
                            uploadedImgWrapper.classList.remove('d-none');
                        }

                        reader.readAsDataURL(file);
                    }
                });
            }

            if (removeBtn) {
                removeBtn.addEventListener('click', function() {
                    uploadInput.value = '';
                    uploadedImgPreview.src = "{{ asset('assets/images/user.png') }}";
                    uploadedImgWrapper.classList.add('d-none');
                });
            }
        });
    </script>

@endsection
