@extends('layouts.appAdmin')

@section('title', 'Daftar Galeri')

@section('content')

    <div class="card h-100 p-0 radius-12">
        <div
            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap justify-content-between gap-3">
            <div class="d-flex flex-column">
                <nav class="text-sm mb-1">
                    <div class="d-flex align-items-center gap-1 text-gray-500">
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-gray-700">Dashboard</a>
                        <span class="text-gray-400">›</span>
                        <span class="text-gray-900 font-semibold">Galeri Wisata</span>
                    </div>
                </nav>
                <h5 class="text-lg font-semibold mt-3 mb-3">Daftar Galeri Wisata</h5>
            </div>
        </div>

        <div class="card-body p-24">
            <div class="table-responsive scroll-sm">
                <table class="table bordered-table sm-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No.</th>
                            <th scope="col">Tanggal dibuat</th>
                            <th scope="col">Nama User</th>
                            <th scope="col" class="text-center">Gambar</th>
                            <th scope="col">Lokasi Wisata</th>
                            <th scope="col">Status</th> {{-- ✅ Tambahkan Kolom Status --}}
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($galeris as $index => $galeri)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($galeri->created_at)->translatedFormat('d M Y') }}</td>
                                <td>{{ $galeri->user->name ?? '-' }}</td>
                                <td class="text-center">
                                    @if ($galeri->image)
                                        <img src="{{ asset('storage/' . $galeri->image) }}" alt="{{ $galeri->title }}"
                                            style="width: 50px; height: 50px; object-fit: cover;"
                                            class="rounded-circle mx-auto">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $galeri->title }}</td>

                                {{-- ✅ Tampilkan Badge Status --}}
                                <td>
                                    @if ($galeri->status === 'aman')
                                        <span class="badge bg-success text-white">Aman</span>
                                    @elseif ($galeri->status === 'ditahan')
                                        <span class="badge bg-warning text-dark">Ditahan</span>
                                    @else
                                        <span class="badge bg-secondary text-white">Unknown</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <div class="d-flex align-items-center gap-10 justify-content-center">
                                        <a href="{{ route('admin.galeri.show', $galeri->slug) }}"
                                            class="bg-info-focus bg-hover-info-200 text-info-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                            <iconify-icon icon="majesticons:eye-line" class="icon text-xl"></iconify-icon>
                                        </a>

                                        <form id="deleteGaleriForm-{{ $galeri->slug }}"
                                            action="{{ route('admin.galeri.destroy', $galeri->slug) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="remove-item-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle btn-delete"
                                                data-form-id="deleteGaleriForm-{{ $galeri->slug }}" title="Hapus">
                                                <iconify-icon icon="fluent:delete-24-regular"
                                                    class="menu-icon"></iconify-icon>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-24 text-secondary-light">
                                    Belum ada galeri wisata yang ditambahkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($galeris->hasPages())
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
                    <span>Showing {{ $galeris->firstItem() }} to {{ $galeris->lastItem() }} of {{ $galeris->total() }}
                        entries</span>
                    <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                        {{-- Previous --}}
                        @if ($galeris->onFirstPage())
                            <li class="page-item disabled">
                                <span
                                    class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
                                    <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                                </span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $galeris->previousPageUrl() }}">
                                    <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                                </a>
                            </li>
                        @endif

                        {{-- Page Numbers --}}
                        @foreach ($galeris->links()->elements[0] as $page => $url)
                            @if ($page == $galeris->currentPage())
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
                        @if ($galeris->hasMorePages())
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $galeris->nextPageUrl() }}">
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
