@extends('layouts.appUser')

@section('title', 'Daftar Galeri')

@section('content')
    <section class="relative md:px-3 mt-6 md:mt-0">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
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
                            <span class="text-slate-700">Galeri Wisata</span>
                        </li>
                    </ul>
                </div>

                <!-- Header: Tombol Create -->
                <div class="flex justify-start mb-6">
                    <a href="{{ route('user.galeri.create') }}"
                        class="mdi mdi-plus-circle-outline mr-2 px-5 py-2 bg-red-500 text-white font-semibold rounded-lg shadow hover:bg-red-600 transition duration-300">
                        Bagikan Fotomu
                    </a>
                </div>

                <!-- Grid Gallery -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse($items as $item)
                        <div class="relative group overflow-hidden rounded-lg shadow-sm">
                            <div class="relative w-full" style="padding-top: 100%;"> <!-- Square ratio -->
                                <a href="{{ route('user.galeri.show', $item->slug) }}" class="absolute inset-0 block">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 group-hover:rotate-1">
                                </a>

                                <!-- Tombol Aksi: Edit & Delete, force show di mobile -->
                                <div
                                    class="absolute top-0 left-0 p-4 opacity-0 group-hover:opacity-100 duration-500 force-show-on-mobile flex gap-2">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('user.galeri.edit', $item->slug) }}" title="Edit"
                                        class="p-2 bg-white/70 dark:bg-slate-800 text-orange-500
                        hover:bg-red-500 hover:text-white rounded-full shadow transition-all duration-300 active:scale-95">
                                        <i data-feather="edit-2" class="w-4 h-4"></i>
                                    </a>

                                    <!-- Tombol Delete -->
                                    <form id="deleteGaleriForm-{{ $item->id }}"
                                        action="{{ route('user.galeri.destroy', $item->slug) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="p-2 bg-white/70 dark:bg-slate-800 text-red-500
                               hover:bg-red-500 hover:text-white
                               rounded-full shadow transition-all duration-300 active:scale-95 btn-delete"
                                            data-form-id="deleteGaleriForm-{{ $item->id }}" title="Delete">
                                            <i data-feather="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>

                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-slate-500 dark:text-slate-400">Belum ada foto di galeri. Upload sekarang!</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if ($items->hasPages())
                    <div class="grid md:grid-cols-12 grid-cols-1 mt-6">
                        <div class="md:col-span-12 text-center">
                            <nav aria-label="Page navigation">
                                <ul class="inline-flex items-center -space-x-px">
                                    {{-- Prev --}}
                                    <li>
                                        <a href="{{ $items->previousPageUrl() ?: '#' }}"
                                            class="size-[40px] inline-flex justify-center items-center text-slate-400 dark:text-slate-500 bg-white dark:bg-slate-800 rounded-s-3xl
                        @if ($items->onFirstPage()) opacity-50 cursor-not-allowed @endif
                        hover:text-white border border-gray-100 dark:border-gray-700 hover:border-red-500 hover:bg-red-500 transition">
                                            <i data-feather="chevron-left" class="size-5"></i>
                                        </a>
                                    </li>

                                    {{-- Pages --}}
                                    @foreach (range(1, $items->lastPage()) as $page)
                                        <li>
                                            <a href="{{ $items->url($page) }}"
                                                class="size-[40px] inline-flex justify-center items-center
                          {{ $items->currentPage() == $page
                              ? 'z-10 text-white bg-red-500 border-red-500'
                              : 'text-slate-400 dark:text-slate-500 bg-white dark:bg-slate-800 border border-gray-100 dark:border-gray-700 hover:border-red-500 hover:bg-red-500 hover:text-white' }}
                          transition">
                                                {{ $page }}
                                            </a>
                                        </li>
                                    @endforeach

                                    {{-- Next --}}
                                    <li>
                                        <a href="{{ $items->nextPageUrl() ?: '#' }}"
                                            class="size-[40px] inline-flex justify-center items-center text-slate-400 dark:text-slate-500 bg-white dark:bg-slate-800 rounded-e-3xl
                        @if (!$items->hasMorePages()) opacity-50 cursor-not-allowed @endif
                        hover:text-white border border-gray-100 dark:border-gray-700 hover:border-red-500 hover:bg-red-500 transition">
                                            <i data-feather="chevron-right" class="size-5"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection
