@extends('layouts.appAdmin')

@section('title', 'Edit Akomodasi: ' . $destinasi->title)

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
                        <span class="text-gray-900 font-semibold">Edit</span>
                    </div>
                </nav>
                <h5 class="text-lg font-semibold mt-3 mb-3">Edit Destinasi Wisata</h5>
            </div>
        </div>


        <div class="card-body p-24">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-8 col-lg-10">
                    <div class="card border">
                        <div class="card-body">
                            <form id="destinasiForm" action="{{ route('admin.destinasi.update', $destinasi->slug) }}"
                                method="POST" enctype="multipart/form-data" class="text-start">
                                @csrf
                                @method('PUT')

                                {{-- Upload Thumbnail --}}
                                <div class="mb-20">
                                    <label class="form-label fw-bold text-neutral-900">Upload Thumbnail</label>
                                    <div class="upload-image-wrapper">
                                        <div id="image-preview-wrapper"
                                            class="position-relative h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                            <img id="uploaded-img__preview"
                                                src="{{ asset('storage/' . $destinasi->image) }}"
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

                                {{-- Nama, Lokasi, Latitude, Longitude --}}
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Nama
                                        Destinasi</label>
                                    <input type="text" name="title" id="title" class="form-control radius-8"
                                        value="{{ old('title', $destinasi->title) }}" required>
                                </div>

                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Lokasi</label>
                                    <input type="text" name="location" id="location" class="form-control radius-8"
                                        value="{{ old('location', $destinasi->location) }}" required>
                                </div>

                                {{-- Upload Gambar 360° (VR) --}}
                                <div class="mb-20">
                                    <label class="form-label fw-bold text-neutral-900">Upload Gambar 360° (VR)</label>
                                    <div class="upload-image-wrapper flex flex-col justify-center items-center gap-3">
                                        <div id="preview-container"
                                            class="uploaded-imgs-container flex justify-center flex-wrap gap-3">
                                            @php
                                                $vrImages = json_decode($destinasi->vr_link, true);
                                            @endphp
                                            @if (!empty($vrImages))
                                                @foreach ($vrImages as $img)
                                                    <div class="relative">
                                                        <img src="{{ asset('storage/' . $img) }}"
                                                            class="h-24 w-32 object-cover rounded-md border" alt="VR">
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                        <label for="upload-file-multiple"
                                            class="upload-file-multiple h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1 mt-4">
                                            <iconify-icon icon="solar:camera-outline"
                                                class="text-3xl text-secondary-light"></iconify-icon>
                                            <span class="fw-semibold text-secondary-light">Upload Baru</span>
                                            <input id="upload-file-multiple" type="file" name="vr_link[]"
                                                accept=".jpg,.jpeg" hidden multiple>
                                        </label>
                                    </div>
                                </div>

                                {{-- Deskripsi --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Deskripsi
                                        Destinasi</label>

                                    <textarea name="description" id="description" class="form-control radius-8" rows="10">
                                    {{ old('description', $destinasi->description) }}
                                </textarea>

                                    @error('description')
                                        <p class="mt-2 text-red-600 dark:text-red-400 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>


                                {{-- Tombol --}}
                                <div
                                    class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-3 mt-5">
                                    <a href="{{ route('admin.destinasi.index') }}"
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
            selector: '#description',
            height: 400,
            plugins: 'lists link image table code help wordcount',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table | code',
            menubar: false,
            content_css: 'default'
        });

        // Thumbnail Preview
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

        // Preview Upload VR Baru
        const uploadVrInput = document.getElementById('upload-file-multiple');
        const previewContainer = document.getElementById('preview-container');

        uploadVrInput.addEventListener('change', function(event) {
            const files = Array.from(event.target.files);

            files.forEach(file => {
                if (!file.type.startsWith('image/')) return;
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('h-24', 'w-32', 'object-cover', 'rounded-md', 'border', 'mt-2');
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
