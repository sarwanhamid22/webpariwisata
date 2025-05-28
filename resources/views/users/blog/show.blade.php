@extends('layouts.appUser')

@section('title', 'Detail Memoar | ' . $blog->title)

@section('head')
    <style>
        .editor-content p {
            margin-bottom: 1rem;
        }

        .editor-content ul {
            list-style-type: disc;
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }

        .editor-content ol {
            list-style-type: decimal;
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }

        .editor-content li {
            margin-bottom: 0.5rem;
        }

        .editor-content h1,
        .editor-content h2,
        .editor-content h3,
        .editor-content h4,
        .editor-content h5,
        .editor-content h6 {
            font-weight: bold;
            margin-top: 1rem;
            margin-bottom: 0.5rem;
        }

        .editor-content table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 1rem;
        }

        .editor-content table,
        .editor-content th,
        .editor-content td {
            border: 1px solid #dee2e6;
            padding: 0.5rem;
        }

        /* Gambar horizontal grid */
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
                                class="text-slate-500 hover:text-slate-800 duration-300">Memoar Wisata</a>
                        </li>
                        <li>
                            <i class="mdi mdi-chevron-right text-slate-400 text-sm"></i>
                        </li>
                        <li>
                            <span class="text-slate-700">{{ $blog->title }}</span>
                        </li>
                    </ul>
                </div>

                {{-- NOTIFIKASI JIKA MEMOAR DITAHAN --}}
                @if ($blog->status === 'ditahan')
                    <div
                        class="mb-6 border-l-4 border-red-600 bg-red-50 dark:bg-red-900/30 p-4 rounded-md shadow-sm flex gap-3 items-start">
                        <div class="text-red-600 dark:text-red-400 text-lg font-bold mt-1">!</div>
                        <div class="flex-1">
                            <h4 class="text-lg font-semibold text-red-700 dark:text-red-300 mb-1">
                                Memoar Ditahan oleh Admin
                            </h4>
                            <p class="text-sm text-red-600 dark:text-red-400 mb-2">
                                Memoar ini telah ditahan dan tidak tampil di publik.
                            </p>
                            @if ($blog->catatan_admin)
                                <div class="bg-red-100 dark:bg-red-900/50 text-sm rounded-md">
                                    Catatan Admin : <em>{{ $blog->catatan_admin }}</em>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif


                <!-- Gambar Utama -->
                @if ($blog->image)
                    <div class="mb-6">
                        <div class="relative w-full" style="height: 400px;">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                                class="absolute inset-0 w-full h-full object-cover rounded-md bg-gray-100 dark:bg-slate-800">
                        </div>
                    </div>
                @endif

                <!-- Judul Artikel -->
                <div class="mb-4">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $blog->title }}
                    </h1>
                </div>

                <!-- Tempat Wisata -->
                <div class="mb-4">
                    <p class="text-base text-gray-700 dark:text-slate-300">
                        Tempat Wisata di <strong>{{ $blog->location }}</strong>
                    </p>
                </div>

                <!-- Tanggal Publikasi -->
                <div class="mb-6">
                    <p class="text-sm text-gray-500 dark:text-slate-400">
                        Dipublikasikan pada {{ $blog->created_at->format('F j, Y') }}
                    </p>
                </div>

                <!-- Isi Konten Artikel -->
                <div class="editor-content prose prose-lg max-w-none dark:prose-invert text-slate-800 dark:text-slate-300">
                    {!! $blog->content !!}
                </div>


                <!-- Aksi (Edit & Delete) -->
                <div class="mt-6 flex gap-3">
                    <!-- Tombol Edit -->
                    <a href="{{ route('user.blog.edit', $blog->slug) }}" title="Edit Memoar"
                        class="inline-flex items-center gap-2 py-2 px-4 bg-red-500/10 text-orange-500 dark:bg-red-500/10 dark:text-orange-500 rounded-md transition-colors duration-300 hover:bg-red-500 hover:text-white">
                        <i data-feather="edit-2" class="w-4 h-4"></i>
                        <span>Edit</span>
                    </a>

                    <!-- Tombol Delete -->
                    <form action="{{ route('user.blog.destroy', $blog->slug) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus Memoar ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Hapus Memoar"
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
