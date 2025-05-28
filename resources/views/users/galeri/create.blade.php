@extends('layouts.appUser')

@section('title', 'Bagikan Foto Barumu')


@section('title', 'Tambah Foto Galeri')

@section('content')
    <section class="relative md:px-3 mt-6 md:mt-0">
        <div class="container mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="p-6 rounded-md shadow-sm bg-white dark:bg-slate-900">

                <!-- Breadcrumb -->
                <div class="text-[13px] font-normal tracking-[0.5px] mb-8">
                    <ul class="flex items-center space-x-1">
                        <li>
                            <a href="{{ url('/') }}" class="text-slate-500 hover:text-slate-800 duration-300">Beranda</a>
                        </li>
                        <li>
                            <i class="mdi mdi-chevron-right text-slate-400 text-sm"></i>
                        </li>
                        <li>
                            <a href="{{ route('user.blog.index') }}"
                                class="text-slate-500 hover:text-slate-800 duration-300">Galeri Wisata</a>
                        </li>
                        <li>
                            <i class="mdi mdi-chevron-right text-slate-400 text-sm"></i>
                        </li>
                        <li>
                            <span class="text-slate-700">Tambah</span>
                        </li>
                    </ul>
                </div>

                <h5 class="text-lg font-semibold mb-6 text-slate-900 dark:text-white">
                    Bagikan Fotomu ke Galeri
                </h5>

                <form action="{{ route('user.galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Preview Gambar -->
                    <div class="mb-6">
                        <div class="relative w-full" style="height: 400px;">
                            <img id="preview-image" src="https://via.placeholder.com/600x400?text=Preview+Gambar"
                                alt="Preview"
                                class="absolute inset-0 w-full h-full object-cover rounded-md bg-gray-100 dark:bg-slate-800">
                        </div>
                    </div>

                    <!-- Upload Gambar -->
                    <div class="mb-6">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                            <div class="relative flex-1">
                                <input type="file" id="image" name="image" accept="image/*"
                                    class="absolute opacity-0 w-px h-px" onchange="previewImage(event)">
                                <label for="image"
                                    class="inline-flex items-center justify-center gap-2 text-sm font-medium text-slate-700 dark:text-slate-300
                            hover:text-red-500 dark:hover:text-red-400 transition-colors cursor-pointer
                            border border-gray-200 dark:border-gray-700 rounded-lg px-4 py-2.5
                            bg-gray-50 dark:bg-slate-800 w-full sm:w-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    Pilih Gambar
                                </label>
                            </div>
                            <span id="file-name" class="text-slate-500 dark:text-slate-400 text-sm truncate">
                                Belum ada file dipilih
                            </span>
                        </div>
                        @error('image')
                            <p class="mt-1 text-red-600 dark:text-red-400 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Judul -->
                    <div class="mb-6">
                        <label for="title" class="block text-slate-900 dark:text-white font-medium mb-2">
                            Tempat Wisata
                        </label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}"
                            class="w-full p-3 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded
                        border border-gray-100 dark:border-gray-700 focus:ring-0"
                            placeholder="Masukkan nama tempat wisata">
                        @error('title')
                            <p class="mt-2 text-red-600 dark:text-red-400 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tombol Submit -->
                    <div class="mt-8 text-right">
                        <button type="submit"
                            class="py-2 px-5 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-md transition duration-300">
                            Upload Foto
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function previewImage(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview-image').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
                document.getElementById('file-name').textContent = input.files[0].name;
            }
        }
    </script>
@endsection
