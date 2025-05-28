<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            confirmButtonText: 'Oke'
        });
    </script>
@endif

@if (session('edit_success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Update Berhasil',
            text: '{{ session('edit_success') }}',
            confirmButtonText: 'Oke'
        });
    </script>
@endif

@if (session('delete_success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Dihapus',
            text: '{{ session('delete_success') }}',
            confirmButtonText: 'Oke'
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Terjadi Kesalahan!',
            text: '{{ session('error') }}',
            confirmButtonText: 'Coba Lagi'
        });
    </script>
@endif

@if (session('fail'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session('fail') }}',
            confirmButtonText: 'Coba Lagi'
        });
    </script>
@endif


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const formId = this.getAttribute('data-form-id');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(formId).submit();
                    }
                });
            });
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const logoutButtons = document.querySelectorAll('.btn-logout');

        logoutButtons.forEach(button => {
            button.addEventListener('click', function() {
                const formId = this.getAttribute('data-form-id');

                Swal.fire({
                    title: 'Yakin ingin logout?',
                    text: "Sesi Anda akan segera berakhir.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Logout',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(formId).submit();
                    }
                });
            });
        });
    });
</script>
