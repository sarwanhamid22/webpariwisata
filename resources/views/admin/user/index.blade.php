@extends('layouts.appAdmin')

@section('title', 'Daftar User')

@section('content')

<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap justify-content-between gap-3">
        <div class="d-flex flex-column">
            <nav class="text-sm mb-1">
                <div class="d-flex align-items-center gap-1 text-gray-500">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-gray-700">Dashboard</a>
                    <span class="text-gray-400">›</span>
                    <span class="text-gray-900 font-semibold">Akun User</span>
                </div>
            </nav>
            <h5 class="text-lg font-semibold mt-3 mb-3">Daftar User</h5>
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
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($users as $index => $user)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('d M Y') }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('assets/images/client/16.jpg') }}" 
                                     alt="{{ $user->name }}" 
                                     class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                <div class="flex-grow-1">
                                    <span class="text-md mb-0 fw-normal text-secondary-light">{{ $user->name }}</span>
                                </div>
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center">
                                <form id="deleteUserForm-{{ $user->id }}" action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                            class="remove-item-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle btn-delete"
                                            data-form-id="deleteUserForm-{{ $user->id }}"
                                            title="Hapus">
                                        <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                    </button>
                                </form>
                            </div>
                        </td>
                        
                                               
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-24 text-secondary-light">
                            Belum ada user yang terdaftar.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
            <span>Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries</span>
            <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                {{-- Previous --}}
                @if ($users->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
                            <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                           href="{{ $users->previousPageUrl() }}">
                            <iconify-icon icon="ep:d-arrow-left"></iconify-icon>
                        </a>
                    </li>
                @endif
    
                {{-- Page Numbers --}}
                @foreach ($users->links()->elements[0] as $page => $url)
                    @if ($page == $users->currentPage())
                        <li class="page-item">
                            <span class="page-link bg-primary-600 text-white fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                               href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
    
                {{-- Next --}}
                @if ($users->hasMorePages())
                    <li class="page-item">
                        <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md"
                           href="{{ $users->nextPageUrl() }}">
                            <iconify-icon icon="ep:d-arrow-right"></iconify-icon>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md">
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
