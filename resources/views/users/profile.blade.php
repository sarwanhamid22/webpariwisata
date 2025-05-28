@extends('layouts.appUser')

@section('title', 'Pengaturan Profil')

@section('content')
    <section class="relative md:px-3 mt-6 md:mt-0">
        <div class="container mx-auto px-4">
            <div class="space-y-6">

                <!-- Personal Detail & Password Section -->
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
                                <span class="text-slate-700">Profil Akun</span>
                            </li>
                        </ul>
                    </div>

                    <h5 class="text-lg font-semibold mb-4 text-slate-900 dark:text-white">Profil Akun</h5>

                    <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Preview Gambar -->
                        <div class="mb-6">
                            <div
                                class="w-28 h-28 mx-auto rounded-full overflow-hidden ring-4 ring-slate-50 dark:ring-slate-800 mb-4">
                                <img id="preview-image"
                                    src="{{ $user->image ? asset('storage/' . $user->image) : asset('assets/images/client/16.jpg') }}"
                                    alt="Foto Profil" class="w-full h-full object-cover">
                            </div>
                        </div>



                        <!-- Upload Gambar -->
                        <div class="mb-6">
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                                <div class="relative flex-1">
                                    <input type="file" id="image" name="image" accept="image/*"
                                        class="absolute opacity-0 w-px h-px" onchange="previewImage(event)">
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
                                        Pilih Gambar
                                    </label>
                                </div>
                                <span id="file-name" class="text-slate-500 dark:text-slate-400 text-sm truncate">
                                    Belum ada file dipilih
                                </span>
                            </div>
                            @error('image')
                                <p class="mt-1 text-red-600 dark:text-red-400 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Data Pribadi -->
                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                            <!-- Nama -->
                            <div>
                                <label class="form-label font-medium text-slate-900 dark:text-white">Nama</label>
                                <div class="form-icon relative mt-2">
                                    <i data-feather="user" class="w-4 h-4 absolute top-3 start-4"></i>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                        class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200
                              rounded border border-gray-100 dark:border-gray-800 focus:ring-0"
                                        placeholder="Nama kamu:" required>
                                </div>
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="form-label font-medium text-slate-900 dark:text-white">Email</label>
                                <div class="form-icon relative mt-2">
                                    <i data-feather="mail" class="w-4 h-4 absolute top-3 start-4"></i>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                        class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200
                              rounded border border-gray-100 dark:border-gray-800 focus:ring-0"
                                        placeholder="Email" required>
                                </div>
                            </div>
                        </div>

                        <!-- Password Section -->
                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mt-6">
                            <!-- Password Lama -->
                            <div>
                                <label class="form-label font-medium text-slate-900 dark:text-white">Password Lama:</label>
                                <div class="form-icon relative mt-2">
                                    <i data-feather="key" class="w-4 h-4 absolute top-3 start-4"></i>
                                    <input type="password" name="old_password" id="old_password" value="********" disabled
                                        class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200
                              rounded border border-gray-100 dark:border-gray-800 focus:ring-0"
                                        placeholder="Masukkan password lama">
                                </div>
                            </div>

                            <!-- Password Baru -->
                            <div>
                                <label class="form-label font-medium text-slate-900 dark:text-white">Password Baru:</label>
                                <div class="form-icon relative mt-2">
                                    <i data-feather="key" class="w-4 h-4 absolute top-3 start-4"></i>
                                    <input type="password" name="new_password" id="new_password"
                                        class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200
                              rounded border border-gray-100 dark:border-gray-800 focus:ring-0"
                                        placeholder="Masukkan password baru">
                                </div>
                            </div>
                        </div>

                        <!-- Konfirmasi Password Baru -->
                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mt-6">
                            <div>
                                <label class="form-label font-medium text-slate-900 dark:text-white">Konfirmasi Password
                                    Baru:</label>
                                <div class="form-icon relative mt-2">
                                    <i data-feather="key" class="w-4 h-4 absolute top-3 start-4"></i>
                                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                        class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200
                              rounded border border-gray-100 dark:border-gray-800 focus:ring-0"
                                        placeholder="Konfirmasi password baru">
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Save -->
                        <div class="mt-6 text-right">
                            <button type="submit"
                                class="py-2 px-5 font-semibold tracking-wide text-base bg-red-500 hover:bg-red-600 text-white
                           rounded-md transition duration-500 hover:scale-105">
                                Save Changes
                            </button>
                        </div>

                    </form>
                </div>

                <!-- Delete Account Section -->
                <div class="p-6 rounded-md shadow-sm bg-white dark:bg-slate-900">
                    <h5 class="text-lg font-semibold mb-5 text-red-600">Hapus Akun :</h5>
                    <p class="text-slate-400 mb-4">Apakah Anda yakin ingin menghapus akun ini? Tekan tombol "Delete" di
                        bawah.</p>

                    <form id="deleteAccountForm" method="POST" action="{{ route('user.profile.delete') }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDeleteAccount()"
                            class="py-2 px-5 inline-block font-semibold tracking-wide text-base bg-red-500 hover:bg-red-600 text-white
                        rounded-md transition duration-500 hover:scale-105">
                            Delete
                        </button>
                    </form>
                </div>


            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Preview Image Profile
        function previewImage(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const file = input.files[0];
                document.getElementById('file-name').textContent = file.name;
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview-image').src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                document.getElementById('file-name').textContent = 'Belum ada file dipilih';
            }
        }

        // Enable Old Password if New Password field focused
        document.getElementById('new_password').addEventListener('focus', function() {
            const oldPassword = document.getElementById('old_password');
            if (oldPassword.hasAttribute('disabled')) {
                oldPassword.removeAttribute('disabled');
                oldPassword.value = '';
            }
        });



        function confirmDeleteAccount() {
            Swal.fire({
                title: 'Yakin ingin menghapus akun ini?',
                text: "Aksi ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteAccountForm').submit();
                }
            });
        }
    </script>
@endsection
