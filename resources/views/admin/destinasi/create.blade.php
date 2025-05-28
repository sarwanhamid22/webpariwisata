@extends('layouts.appAdmin')

@section('title', 'Buat Destinasi Baru')


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
                        <span class="text-gray-900 font-semibold">Tambah</span>
                    </div>
                </nav>
                <h5 class="text-lg font-semibold mt-3 mb-3">Tambahkan Destinasi Baru</h5>
            </div>
        </div>


        <div class="card-body p-24">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-8 col-lg-10">
                    <div class="card border">
                        <div class="card-body">
                            <form id="destinasiForm" action="{{ route('admin.destinasi.store') }}" method="POST"
                                enctype="multipart/form-data" class="text-start">
                                @csrf

                                {{-- Upload Image --}}
                                <div class="mb-20">
                                    <label class="form-label fw-bold text-neutral-900">Upload Thumbnail</label>
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
                                            class="upload-file h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1"
                                            for="upload-file">
                                            <iconify-icon icon="solar:camera-outline"
                                                class="text-xl text-secondary-light"></iconify-icon>
                                            <span class="fw-semibold text-secondary-light">Upload</span>
                                            <input id="upload-file" name="image" type="file" hidden
                                                accept=".jpg,.jpeg,.png">
                                        </label>
                                    </div>
                                </div>

                                {{-- Nama Destinasi --}}
                                <div class="mb-20">
                                    <label for="title"
                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Nama Destinasi <span
                                            class="text-danger-600">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control radius-8"
                                        placeholder="Nama Destinasi" required>
                                </div>

                                {{-- Lokasi --}}
                                <div class="mb-20">
                                    <label for="location"
                                        class="form-label fw-semibold text-primary-light text-sm mb-8">Lokasi <span
                                            class="text-danger-600">*</span></label>
                                    <input type="text" name="location" id="location" class="form-control radius-8"
                                        placeholder="Lokasi Destinasi" required>
                                </div>

                                {{-- Upload Gambar 360° (VR) --}}
                                <div class="mb-20">
                                    <label class="form-label fw-bold text-neutral-900">Upload Gambar 360° (VR)</label>
                                    <div class="upload-image-wrapper flex flex-col justify-center items-center gap-3">
                                        <!-- Tempat preview hasil upload -->
                                        <div class="uploaded-imgs-container flex justify-center flex-wrap gap-3"
                                            id="preview-container"></div>

                                        <!-- Tombol upload -->
                                        <label for="upload-file-multiple"
                                            class="upload-file-multiple h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1">
                                            <iconify-icon icon="solar:camera-outline"
                                                class="text-3xl text-secondary-light"></iconify-icon>
                                            <span class="fw-semibold text-secondary-light">Upload</span>
                                            <input id="upload-file-multiple" type="file" name="vr_link[]"
                                                accept=".jpg,.jpeg" hidden multiple required>
                                        </label>
                                    </div>
                                </div>

                                {{-- Deskripsi --}}
                                <div class="mb-4">
                                    <label for="description" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                        Deskripsi Destinasi
                                    </label>

                                    <textarea name="description" id="description" class="form-control radius-8" rows="10">{{ old('description') }}</textarea>

                                    @error('description')
                                        <p class="mt-2 text-red-600 dark:text-red-400 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Tombol --}}
                                <div
                                    class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-3 mt-3">
                                    <a href="{{ route('admin.destinasi.index') }}"
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

    <script src="https://cdn.tiny.cloud/1/9jeutgj26w0w1d6bxk3pi950iahzlmypzfz8kd1hn85fzxfu/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#description',
            height: 400,
            plugins: 'lists link image table code help wordcount',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table | code',
            menubar: false,
            content_css: 'default'
        });


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

        document.getElementById('upload-file-multiple').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('preview-container');

            const files = Array.from(event.target.files);
            const maxFiles = 5;
            const existingPreviews = previewContainer.querySelectorAll('img').length;

            if (existingPreviews + files.length > maxFiles) {
                alert('Maksimal upload 5 gambar 360°!');
                event.target.value = '';
                return;
            }

            files.forEach(file => {
                if (!file.type.startsWith('image/')) return;

                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('h-24', 'w-32', 'object-cover', 'rounded-md', 'border');
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });

        });
    </script>

@endsection
