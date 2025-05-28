@extends('layouts.appAdmin')

@section('title', 'Daftar Review User')

@section('content')

    <div class="card h-100 p-0 radius-12">
        <div
            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap justify-content-between gap-3">
            <div class="d-flex flex-column">
                <nav class="text-sm mb-1">
                    <div class="d-flex align-items-center gap-1 text-gray-500">
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-gray-700">Dashboard</a>
                        <span class="text-gray-400">›</span>
                        <span class="text-gray-900 font-semibold">Review Wisata</span>
                    </div>
                </nav>
                <h5 class="text-lg font-semibold mt-3 mb-3">Daftar Review User</h5>
            </div>
        </div>


        <div class="card-body p-24">
            <div class="table-responsive scroll-sm">
                <table class="table bordered-table sm-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No.</th>
                            <th scope="col">Tanggal Dibuat</th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Destinasi</th>
                            <th scope="col">Rating</th>
                            <th scope="col" class="text-center">Review</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($reviews as $index => $review)
                            <tr>
                                <td class="text-center">{{ $reviews->firstItem() + $index }}</td>
                                <td>{{ \Carbon\Carbon::parse($review->created_at)->translatedFormat('d M Y') }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $review->user->image ? asset('storage/' . $review->user->image) : asset('assets/images/client/16.jpg') }}"
                                            alt="{{ $review->user->name }}"
                                            class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                        <div class="flex-grow-1">
                                            <span
                                                class="text-md mb-0 fw-normal text-secondary-light">{{ $review->user->name ?? '-' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $review->destinasi->location ?? '-' }}</td>
                                <td>{{ number_format($review->rating, 1) }} ⭐</td>
                                <td>{{ $review->review }}</td>
                                <td class="d-flex align-items-center justify-content-center">
                                    <form id="deleteReviewForm-{{ $review->id }}"
                                        action="{{ route('admin.review.destroy', $review->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="remove-item-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle btn-delete"
                                            data-form-id="deleteReviewForm-{{ $review->id }}" title="Hapus">
                                            <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-24 text-secondary-light">
                                    Belum ada review yang terdaftar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($reviews->hasPages())
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
                    <span>Menampilkan {{ $reviews->firstItem() }} sampai {{ $reviews->lastItem() }} dari total
                        {{ $reviews->total() }} review</span>
                    <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                        {{-- Previous --}}
                        @if ($reviews->onFirstPage())
                            <li class="page-item disabled">
                                <span
                                    class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
                                    <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                                </span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $reviews->previousPageUrl() }}">
                                    <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                                </a>
                            </li>
                        @endif

                        {{-- Page Numbers --}}
                        @foreach ($reviews->links()->elements[0] as $page => $url)
                            @if ($page == $reviews->currentPage())
                                <li class="page-item">
                                    <span
                                        class="page-link bg-primary-600 text-white fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                        href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- Next --}}
                        @if ($reviews->hasMorePages())
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $reviews->nextPageUrl() }}">
                                    <iconify-icon icon="ep:d-arrow-right"></iconify-icon>
                                </a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span
                                    class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
                                    <iconify-icon icon="ep:d-arrow-right"></iconify-icon>
                                </span>
                            </li>
                        @endif
                    </ul>
                </div>
            @endif
        </div>
    </div>

@endsection
