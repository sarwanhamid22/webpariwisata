@extends('layouts.appAdmin')

@section('title', 'Pengaturan Akun')


@section('content')

    <div class="row gy-4">
        <div class="col-lg-8 mx-auto">
            <div class="card h-100">
                <div class="card-body p-24">
                    <h5 class="text-lg font-semibold mb-24">Pengaturan Akun</h5>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Foto Profil -->
                        <div class="mb-24 mt-16 d-flex justify-content-center">
                            <div class="avatar-upload position-relative" style="width: 120px; height: 120px;">
                                <div class="avatar-preview rounded-circle overflow-hidden border"
                                    style="width: 120px; height: 120px;">
                                    <img id="imagePreview"
                                        src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('assets/images/client/16.jpg') }}"
                                        class="w-100 h-100 object-fit-cover" alt="Foto Profil">
                                </div>
                                <div class="avatar-edit position-absolute bottom-0 end-0 me-24 mt-16 z-1 cursor-pointer">
                                    <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg" hidden>
                                    <label for="imageUpload"
                                        class="w-32-px h-32-px d-flex justify-content-center align-items-center bg-primary-50 text-primary-600 border border-primary-600 bg-hover-primary-100 text-lg rounded-circle"
                                        style="position: absolute; bottom: 0; right: -12px;">
                                        <iconify-icon icon="solar:camera-outline" class="icon"></iconify-icon>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Nama dan Email -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Nama
                                        Lengkap</label>
                                    <input type="text" class="form-control radius-8" name="name"
                                        value="{{ old('name', Auth::user()->name) }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label class="form-label fw-semibold text-primary-light text-sm mb-8">Email</label>
                                    <input type="email" class="form-control radius-8" name="email"
                                        value="{{ old('email', Auth::user()->email) }}" required>
                                </div>
                            </div>
                        </div>

                        <hr class="my-24">
                        <h6 class="text-md text-primary-light mb-16">Ubah Password</h6>

                        <!-- Password Lama -->
                        <div class="mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Password Lama</label>
                            <input type="password" id="old_password" name="old_password" class="form-control radius-8"
                                value="********" readonly
                                onfocus="this.removeAttribute('readonly'); this.value=''; this.placeholder='Masukkan password lama';">
                        </div>

                        <!-- Password Baru -->
                        <div class="mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Password Baru</label>
                            <input type="password" id="new_password" name="new_password" class="form-control radius-8"
                                placeholder="Masukkan password baru">
                        </div>

                        <!-- Konfirmasi Password Baru -->
                        <div class="mb-20">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Konfirmasi Password
                                Baru</label>
                            <input type="password" name="new_password_confirmation" class="form-control radius-8"
                                placeholder="Konfirmasi password baru">
                        </div>

                        <div class="d-flex justify-content-center gap-3 mt-32">
                            <button type="submit" class="btn btn-primary text-md px-56 py-12 radius-8">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        // Preview gambar
        const imageInput = document.getElementById('imageUpload');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
