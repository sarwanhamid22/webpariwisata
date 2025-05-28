@extends('layouts.appUser')

@section('title', 'Daftar Memoar')

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
                            <span class="text-slate-700">Memoar Wisata</span>
                        </li>
                    </ul>
                </div>



                <!-- Header: Tombol Create New Post -->
                <div class="flex justify-start mb-6">
                    <a href="{{ route('user.blog.create') }}"
                        class="px-5 py-2 bg-red-500 text-white font-semibold rounded-lg shadow
                hover:bg-red-600 transition duration-300 mdi mdi-plus-circle-outline mr-2">
                        Buat Memoar Wisatamu
                    </a>
                </div>


                <!-- Daftar Post -->
                <div class="gap-4">
                    @forelse($posts as $post)
                        <div
                            class="flex items-center p-4 gap-5
                    bg-gray-50 dark:bg-slate-800
                    rounded-lg shadow-sm hover:shadow-md
                    transition-shadow duration-300">

                            <!-- Thumbnail Post -->
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                class="w-20 h-20 rounded-md object-cover flex-shrink-0" />

                            <!-- Detail Post -->
                            <div class="flex-grow">
                                <h4 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    <a href="{{ route('user.blog.show', $post->slug) }}"
                                        class="hover:text-red-500 transition-colors duration-300">
                                        {{ $post->title }}
                                    </a>
                                </h4>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                    {!! \Illuminate\Support\Str::limit(strip_tags($post->content), 100) !!}
                                </p>
                            </div>

                            <!-- Aksi (Edit & Delete) -->
                            <div class="flex flex-col items-center gap-1">
                                <!-- Tombol Edit -->
                                <a href="{{ route('user.blog.edit', $post->slug) }}" title="Edit"
                                    class="inline-flex items-center justify-center p-2
                    bg-red-500/10 text-orange-500
                    hover:bg-red-500 hover:text-white
                    rounded-full transition-colors duration-300 group">
                                    <i data-feather="edit-2" class="w-4 h-4"></i>
                                </a>

                                <!-- Tombol Delete -->
                                <form id="deletePostForm-{{ $post->id }}"
                                    action="{{ route('user.blog.destroy', $post->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="inline-flex items-center justify-center p-2
                           bg-red-500/10 text-red-600
                           hover:bg-red-500 hover:text-white
                           rounded-full transition-colors duration-300 btn-delete"
                                        data-form-id="deletePostForm-{{ $post->id }}" title="Delete">
                                        <i data-feather="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>

                            </div>

                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-slate-500 dark:text-slate-400">Belum ada memoar. Buat memoar pertamamu!</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination Kustom -->
                @if ($posts->hasPages())
                    <div class="grid md:grid-cols-12 grid-cols-1 mt-6">
                        <div class="md:col-span-12 text-center">
                            <nav aria-label="Page navigation">
                                <ul class="inline-flex items-center -space-x-px">
                                    {{-- Prev --}}
                                    <li>
                                        <a href="{{ $posts->previousPageUrl() ?: '#' }}"
                                            class="size-[40px] inline-flex justify-center items-center
                              text-slate-400 dark:text-slate-500
                              bg-white dark:bg-slate-800
                              rounded-s-3xl
                              @if ($posts->onFirstPage()) opacity-50 cursor-not-allowed @endif
                              hover:text-white
                              border border-gray-100 dark:border-gray-700
                              hover:border-red-500 hover:bg-red-500">
                                            <i data-feather="chevron-left" class="size-5"></i>
                                        </a>
                                    </li>

                                    {{-- Pages --}}
                                    @foreach (range(1, $posts->lastPage()) as $page)
                                        <li>
                                            <a href="{{ $posts->url($page) }}"
                                                class="size-[40px] inline-flex justify-center items-center
                                {{ $posts->currentPage() == $page
                                    ? 'z-10 text-white bg-red-500 border-red-500'
                                    : 'text-slate-400 dark:text-slate-500 bg-white dark:bg-slate-800 border border-gray-100 dark:border-gray-700 hover:border-red-500 hover:bg-red-500 hover:text-white' }}">
                                                {{ $page }}
                                            </a>
                                        </li>
                                    @endforeach

                                    {{-- Next --}}
                                    <li>
                                        <a href="{{ $posts->nextPageUrl() ?: '#' }}"
                                            class="size-[40px] inline-flex justify-center items-center
                              text-slate-400 dark:text-slate-500
                              bg-white dark:bg-slate-800
                              rounded-e-3xl
                              @if (!$posts->hasMorePages()) opacity-50 cursor-not-allowed @endif
                              hover:text-white
                              border border-gray-100 dark:border-gray-700
                              hover:border-red-500 hover:bg-red-500">
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
