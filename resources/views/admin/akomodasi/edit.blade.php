@extends('layouts.appAdmin')

@section('title', 'Edit Akomodasi: ' . $akomodasi->nama)


@section('head')
    <style>
        /* CSS agar galeri tampil horizontal dan rapi */
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
                        <span class="text-gray-900 font-semibold">Edit</span>
                    </div>
                </nav>
                <h5 class="text-lg font-semibold mt-3 mb-3">Edit Akomodasi: {{ $akomodasi->nama }}</h5>
            </div>
        </div>

        <div class="card-body p-24">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-8 col-lg-10">
                    <div class="card border">
                        <div class="card-body">
                            <form id="akomodasiForm" action="{{ route('admin.akomodasi.update', $akomodasi->id) }}"
                                method="POST" enctype="multipart/form-data" class="text-start">
                                @csrf
                                @method('PUT')

                                {{-- Galeri yang sudah ada --}}
                                <div class="gallery-grid justify-content-center">
                                    @forelse($akomodasi->images as $img)
                                        <img src="{{ asset('storage/' . $img->image) }}" alt="{{ $akomodasi->nama }}">
                                    @empty
                                        <p class="text-secondary-light">Belum ada gambar untuk akomodasi ini.</p>
                                    @endforelse
                                </div>


                                {{-- Upload Gambar Baru (Multiple) --}}
                                <div class="mb-20">
                                    <label class="form-label fw-bold text-neutral-900">Tambah Gambar Baru (Max 6
                                        gambar)</label>
                                    <div class="upload-image-wrapper flex flex-col justify-center items-center gap-3">
                                        <div class="uploaded-imgs-container flex flex-row justify-start flex-wrap gap-3"
                                            id="preview-container"></div>
                                        <label for="upload-file-multiple"
                                            class="upload-file-multiple h-100-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1">
                                            <iconify-icon icon="solar:camera-outline"
                                                class="text-3xl text-secondary-light"></iconify-icon>
                                            <span class="fw-semibold text-secondary-light">Upload</span>
                                            <input id="upload-file-multiple" type="file" name="images[]"
                                                accept=".jpg,.jpeg,.png" hidden multiple>
                                        </label>
                                    </div>
                                </div>

                                {{-- Nama Akomodasi --}}
                                <div class="mb-20">
                                    <label for="nama"
                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Nama Akomodasi <span
                                            class="text-danger-600">*</span></label>
                                    <input type="text" name="nama" id="nama" class="form-control radius-8"
                                        placeholder="Nama Akomodasi" value="{{ old('nama', $akomodasi->nama) }}" required>
                                </div>

                                {{-- Lokasi --}}
                                <div class="mb-20">
                                    <label for="lokasi"
                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Lokasi <span
                                            class="text-danger-600">*</span></label>
                                    <input type="text" name="lokasi" id="lokasi" class="form-control radius-8"
                                        placeholder="Lokasi Akomodasi" value="{{ old('lokasi', $akomodasi->lokasi) }}"
                                        required>
                                </div>

                                {{-- Alamat --}}
                                <div class="mb-20">
                                    <label for="alamat"
                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Alamat</label>
                                    <input type="text" name="alamat" id="alamat" class="form-control radius-8"
                                        placeholder="Alamat Akomodasi" value="{{ old('alamat', $akomodasi->alamat) }}">
                                </div>

                                {{-- Harga Mulai --}}
                                <div class="mb-20">
                                    <label for="harga_mulai"
                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Harga Mulai
                                        (Rp)</label>
                                    <input type="text" name="harga_mulai" id="harga_mulai" class="form-control radius-8"
                                        placeholder="Contoh: 350.000"
                                        value="{{ old('harga_mulai', number_format($akomodasi->harga_mulai, 0, ',', '.')) }}">
                                </div>

                                {{-- Kontak --}}
                                <div class="mb-20">
                                    <label for="kontak"
                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Kontak</label>
                                    <input type="text" name="kontak" id="kontak" class="form-control radius-8"
                                        placeholder="Contoh: 08123456789" value="{{ old('kontak', $akomodasi->kontak) }}">
                                </div>

                                {{-- Deskripsi --}}
                                <div class="mb-4">
                                    <label for="deskripsi" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                        Deskripsi Akomodasi
                                    </label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control radius-8" rows="10">{{ old('deskripsi', $akomodasi->deskripsi) }}</textarea>

                                    @error('deskripsi')
                                        <p class="mt-2 text-red-600 dark:text-red-400 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Tombol --}}
                                <div
                                    class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-3 mt-3">
                                    <a href="{{ route('admin.akomodasi.index') }}"
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
    <script src="https://cdn.tiny.cloud/1/9jeutgj26w0w1d6bxk3pi950iahzlmypzfz8kd1hn85fzxfu/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#deskripsi',
            height: 400,
            plugins: 'lists link image table code help wordcount',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table | code',
            menubar: false,
            content_css: 'default'
        });
    </script>

    <script>
        document.getElementById('upload-file-multiple').addEventListener('change', function(event) {
            const files = event.target.files;
            const previewContainer = document.getElementById('preview-container');

            // Clear previous previews
            previewContainer.innerHTML = '';

            if (files.length > 6) {
                alert('Maksimal upload 6 gambar saja!');
                event.target.value = ''; // Clear input
                return;
            }

            Array.from(files).forEach(file => {
                if (!file.type.match('image.*')) {
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgWrapper = document.createElement('div');
                    imgWrapper.classList.add('position-relative');
                    imgWrapper.style.width = '100px';
                    imgWrapper.style.height = '100px';
                    imgWrapper.style.display = 'inline-block';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Preview';
                    img.classList.add('object-fit-cover', 'radius-8', 'border');
                    img.style.width = '100%';
                    img.style.height = '100%';

                    imgWrapper.appendChild(img);
                    previewContainer.appendChild(imgWrapper);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>

    <script>
        const hargaInput = document.getElementById('harga_mulai');

        hargaInput.addEventListener('input', function(e) {
            let value = this.value.replace(/[^0-9]/g, '');
            if (value) {
                this.value = formatRupiah(value);
            } else {
                this.value = '';
            }
        });

        function formatRupiah(angka) {
            return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }
    </script>

@endsection
