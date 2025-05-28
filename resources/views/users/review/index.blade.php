@extends('layouts.appUser')

@section('title', 'Riwayat Review')

@section('head')
<style>
    .review-card {
        position: relative;
        padding: 1.5rem;
        background-color: #f9fafb;
        border-radius: 0.5rem;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        margin-bottom: 1.5rem;
    }

    .review-actions {
        position: absolute;
        bottom: 1rem;
        right: 1rem;
        display: flex;
        gap: 0.5rem;
    }

    .review-actions .btn-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 9999px;
        background-color: rgba(255, 0, 0, 0.1);
        color: #ef4444;
        transition: all 0.2s ease-in-out;
        border: none;
        cursor: pointer;
    }


        .review-actions .btn-icon-edit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 9999px;
        background-color: rgba(255, 0, 0, 0.1);
        color: #ff9800;
        transition: all 0.2s ease-in-out;
        border: none;
        cursor: pointer;
    }
    .review-actions .btn-icon-edit:hover {
        background-color: #ef4444;
        color: white;
    }
    .review-actions .btn-icon:hover {
        background-color: #ef4444;
        color: white;
    }
    

    .review-actions i {
        font-size: 16px;
    }

    .rating-stars {
        display: flex;
        align-items: center;
        gap: 4px;
        font-size: 1rem;
        color: #f59e0b;
    }

    .rating-value {
        margin-left: 0.75rem;
        font-weight: 500;
        color: #111827;
    }
</style>
@endsection

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
                        <span class="text-slate-700">Riwayat Review</span>
                    </li>
                </ul>
            </div>

            <h5 class="text-lg font-semibold mb-4 text-slate-900 dark:text-white">Riwayat Review</h5>

            <!-- Daftar Review -->
            <div class="gap-4">
                @forelse ($reviews as $review)
                    <div class="review-card">
                        <!-- Nama Destinasi -->
                        <h5 class="text-lg font-semibold text-gray-900 mb-2">
                            {{ $review->destinasi->title ?? '-' }}
                        </h5>

                        <!-- Rating -->
                        <div class="rating-stars mb-2">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $review->rating)
                                    <i class="mdi mdi-star"></i>
                                @elseif ($i - $review->rating < 1)
                                    <i class="mdi mdi-star-half-full"></i>
                                @else
                                    <i class="mdi mdi-star-outline"></i>
                                @endif
                            @endfor
                            <span class="rating-value">{{ number_format($review->rating, 1) }}</span>
                        </div>

                        <!-- Isi Review -->
                        <p class="text-gray-700 text-sm mb-8">{{ $review->review }}</p>

                        <!-- Tombol Edit & Delete -->
                        <div class="review-actions">
                            <a href="{{ route('user.review.edit', $review->id) }}" class="btn-icon-edit" title="Edit">
                                <i data-feather="edit-2" class="w-4 h-4"></i>
                            </a>

                            <form id="deleteReviewForm-{{ $review->id }}"
                                action="{{ route('user.review.destroy', $review->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                        class="btn-icon btn-delete"
                                        data-form-id="deleteReviewForm-{{ $review->id }}"
                                        title="Hapus">
                                    <i data-feather="trash-2" class="w-4 h-4"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12">
                        <p class="text-slate-500 dark:text-slate-400">Belum ada review.</p>
                    </div>
                @endforelse
            </div>


            <!-- Pagination Kustom -->
            @if ($reviews->hasPages())
                <div class="grid md:grid-cols-12 grid-cols-1 mt-6">
                    <div class="md:col-span-12 text-center">
                        <nav aria-label="Page navigation">
                            <ul class="inline-flex items-center -space-x-px">
                                {{-- Prev --}}
                                <li>
                                    <a href="{{ $reviews->previousPageUrl() ?: '#' }}"
                                        class="size-[40px] inline-flex justify-center items-center
                                            text-slate-400 dark:text-slate-500
                                            bg-white dark:bg-slate-800
                                            rounded-s-3xl
                                            @if ($reviews->onFirstPage()) opacity-50 cursor-not-allowed @endif
                                            hover:text-white
                                            border border-gray-100 dark:border-gray-700
                                            hover:border-red-500 hover:bg-red-500">
                                        <i data-feather="chevron-left" class="size-5"></i>
                                    </a>
                                </li>

                                {{-- Pages --}}
                                @foreach (range(1, $reviews->lastPage()) as $page)
                                    <li>
                                        <a href="{{ $reviews->url($page) }}"
                                            class="size-[40px] inline-flex justify-center items-center
                                                {{ $reviews->currentPage() == $page
                                                    ? 'z-10 text-white bg-red-500 border-red-500'
                                                    : 'text-slate-400 dark:text-slate-500 bg-white dark:bg-slate-800 border border-gray-100 dark:border-gray-700 hover:border-red-500 hover:bg-red-500 hover:text-white' }}">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endforeach

                                {{-- Next --}}
                                <li>
                                    <a href="{{ $reviews->nextPageUrl() ?: '#' }}"
                                        class="size-[40px] inline-flex justify-center items-center
                                            text-slate-400 dark:text-slate-500
                                            bg-white dark:bg-slate-800
                                            rounded-e-3xl
                                            @if (!$reviews->hasMorePages()) opacity-50 cursor-not-allowed @endif
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
