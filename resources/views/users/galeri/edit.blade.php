@extends('layouts.appUser')

@section('title', 'Edit Foto | ' . $item->title)

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
                            <span class="text-slate-700">Edit</span>
                        </li>
                    </ul>
                </div>

                <h5 class="text-lg font-semibold mb-4 text-slate-900 dark:text-white">
                    Edit Fotomu di Galeri
                </h5>

                <form action="{{ route('user.galeri.update', $item->slug) }}" method="POST" enctype="multipart/form-data"
                    id="galeri-edit-form">
                    @csrf
                    @method('PUT')

                    <!-- Current Image Preview (jika ada) -->
                    @if ($item->image)
                        <div class="mb-6">
                            <div class="relative w-full" style="height: 400px;">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                    class="absolute inset-0 w-full h-full object-cover rounded-md bg-gray-100 dark:bg-slate-800">
                            </div>
                        </div>
                    @endif

                    <!-- Upload Gambar -->
                    <div class="mb-6">
                        <label class="block text-slate-900 dark:text-white font-medium mb-2">
                            Ganti Gambar (opsional)
                        </label>
                        <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                            <div class="relative flex-1">
                                <input type="file" id="image" name="image" accept="image/*"
                                    class="absolute opacity-0 w-px h-px"
                                    onchange="
                       document.getElementById('file-name').textContent = this.files[0]?.name || '{{ basename($item->image) }}';
                     ">
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
                                    Pilih Gambar Baru
                                </label>
                            </div>
                            <span id="file-name" class="text-sm text-gray-500 dark:text-gray-400 truncate flex-1">
                                {{ basename($item->image) }}
                            </span>
                        </div>
                        @error('image')
                            <p class="mt-1 text-red-600 dark:text-red-400 text-sm">{{ $message }}</p>
                        @enderror
                    </div>


                    <!-- Title -->
                    <div class="mb-6">
                        <label for="title" class="block text-slate-900 dark:text-white font-medium mb-2">
                            Tempat Wisata
                        </label>
                        <input type="text" id="title" name="title" value="{{ old('title', $item->title) }}"
                            class="w-full p-3 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded border border-gray-100 dark:border-gray-800 focus:ring-0"
                            placeholder="Masukkan judul gambar" required>
                        @error('title')
                            <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-5 text-right">
                        <button type="submit"
                            class="py-2 px-5 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-md transition duration-300">
                            Perbarui Galeri
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
