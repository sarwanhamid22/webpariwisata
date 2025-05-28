@extends('layouts.appAdmin')

@section('title', 'Daftar Akomodasi')


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
                        <span class="text-gray-900 font-semibold">Akomodasi Wisata</span>
                    </div>
                </nav>
                <h5 class="text-lg font-semibold mt-3 mb-3">Daftar Akomodasi Wisata</h5>
            </div>

            {{-- Kanan: Tombol --}}
            <a href="{{ route('admin.akomodasi.create') }}"
                class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                Tambahkan Akomodasi
            </a>
        </div>

        <div class="card-body p-24">
            <div class="table-responsive scroll-sm">
                <table class="table bordered-table sm-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No.</th>
                            <th scope="col">Nama Akomodasi</th>
                            <th scope="col" class="text-center">Gambar</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Kontak</th>
                            <th scope="col">Harga Mulai</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($akomodasis as $index => $akomodasi)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>
                                    <a href="{{ route('admin.akomodasi.show', $akomodasi->id) }}"
                                        class="text-primary-600 hover:underline">
                                        {{ $akomodasi->nama }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    @if ($akomodasi->images->first())
                                        <img src="{{ asset('storage/' . $akomodasi->images->first()->image) }}"
                                            alt="{{ $akomodasi->nama }}" class="rounded-circle object-fit-cover mx-auto"
                                            style="width: 50px; height: 50px;">
                                    @else
                                        <span class="text-secondary-light">-</span>
                                    @endif
                                </td>
                                <td>{{ $akomodasi->lokasi ?? '-' }}</td>
                                <td>{{ $akomodasi->kontak ?? '-' }}</td>
                                <td>Rp {{ number_format($akomodasi->harga_mulai ?? 0, 0, ',', '.') }} / malam</td>
                                <td class="text-center">
                                    <div class="d-flex align-items-center gap-10 justify-content-center">
                                        <a href="{{ route('admin.akomodasi.show', $akomodasi->id) }}"
                                            class="bg-info-focus bg-hover-info-200 text-info-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                            <iconify-icon icon="majesticons:eye-line" class="icon text-xl"></iconify-icon>
                                        </a>
                                        <a href="{{ route('admin.akomodasi.edit', $akomodasi->id) }}"
                                            class="bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                            <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
                                        </a>

                                        <form id="deleteAkomodasiForm-{{ $akomodasi->id }}"
                                            action="{{ route('admin.akomodasi.destroy', $akomodasi->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="remove-item-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle btn-delete"
                                                data-form-id="deleteAkomodasiForm-{{ $akomodasi->id }}" title="Hapus">
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
                                    Belum ada akomodasi yang ditambahkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            @if ($akomodasis->hasPages())
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
                    <span>Showing {{ $akomodasis->firstItem() }} to {{ $akomodasis->lastItem() }} of
                        {{ $akomodasis->total() }} entries</span>
                    <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                        {{-- Previous --}}
                        @if ($akomodasis->onFirstPage())
                            <li class="page-item disabled">
                                <span
                                    class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
                                    <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                                </span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $akomodasis->previousPageUrl() }}">
                                    <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                                </a>
                            </li>
                        @endif

                        {{-- Page Numbers --}}
                        @foreach ($akomodasis->links()->elements[0] as $page => $url)
                            @if ($page == $akomodasis->currentPage())
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
                        @if ($akomodasis->hasMorePages())
                            <li class="page-item">
                                <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                                    href="{{ $akomodasis->nextPageUrl() }}">
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
