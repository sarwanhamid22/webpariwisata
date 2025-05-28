@extends('layouts.appUser')

@section('title', 'Detail Foto | ' . $item->title)

@section('content')
    <section class="relative md:px-3 mt-6 md:mt-0">
        <div class="container mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
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
                            <span class="text-slate-700">{{ $item->title }}</span>
                        </li>
                    </ul>
                </div>

                {{-- NOTIFIKASI JIKA GALERI DITAHAN --}}
                @if ($item->status === 'ditahan')
                    <div
                        class="mb-6 border-l-4 border-red-600 bg-red-50 dark:bg-red-900/30 p-4 rounded-md shadow-sm flex gap-3 items-start">
                        <div class="text-red-600 dark:text-red-400 text-lg font-bold mt-1">!</div>
                        <div class="flex-1">
                            <h4 class="text-lg font-semibold text-red-700 dark:text-red-300 mb-1">
                                Foto Ditahan oleh Admin
                            </h4>
                            <p class="text-sm text-red-600 dark:text-red-400 mb-2">
                                Foto ini telah ditahan dan tidak tampil di publik.
                            </p>
                            @if ($item->catatan_admin)
                                <div class="bg-red-100 dark:bg-red-900/50 text-sm rounded-md">
                                    Catatan Admin : <em>{{ $item->catatan_admin }}</em>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                {{-- FOTO --}}
                @if ($item->image)
                    <div class="mb-6">
                        <div class="relative w-full" style="height: 400px;">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                class="absolute inset-0 w-full h-full object-cover rounded-md bg-gray-100 dark:bg-slate-800">

                            {{-- LABEL: Tampilkan jika galeri ditahan --}}
                            @if ($item->status === 'ditahan')
                                <div class="absolute top-0 left-0 overflow-hidden w-full h-full pointer-events-none">
                                    <div
                                        class="absolute -top-16 -left-20 bg-red-500 text-white text-center text-2xl font-extrabold italic py-4 px-12 shadow-lg tracking-widest w-max">
                                        DITAHAN
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                {{-- Judul --}}
                <div class="mb-4">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                        Tempat Wisata di {{ $item->title }}
                    </h1>
                </div>

                {{-- Tanggal Publikasi --}}
                <div class="mb-6">
                    <p class="text-sm text-gray-500 dark:text-slate-400">
                        Dipublikasikan pada {{ $item->created_at->format('F j, Y') }}
                    </p>
                </div>

                {{-- Aksi (Edit & Delete) --}}
                <div class="mt-6 flex gap-3">
                    {{-- Tombol Edit --}}
                    <a href="{{ route('user.galeri.edit', $item->slug) }}" title="Edit Foto"
                        class="inline-flex items-center gap-2 py-2 px-4 bg-red-500/10 text-orange-500 dark:bg-red-500/10 dark:text-orange-500 rounded-md transition-colors duration-300 hover:bg-red-500 hover:text-white">
                        <i data-feather="edit-2" class="w-4 h-4"></i>
                        <span>Edit</span>
                    </a>

                    {{-- Tombol Delete --}}
                    <form action="{{ route('user.galeri.destroy', $item->slug) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Hapus Foto"
                            class="inline-flex items-center gap-2 py-2 px-4 bg-red-500/10 text-red-600 dark:bg-red-500/10 dark:text-red-600 rounded-md transition-colors duration-300 hover:bg-red-500 hover:text-white">
                            <i data-feather="trash-2" class="w-4 h-4"></i>
                            <span>Hapus</span>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
