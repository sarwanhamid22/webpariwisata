@extends('layouts.app')

@section('title', 'Destinasi Wisata | ' . $destinasi->title)

@section('head')
    <style>
        .editor-content p {
            margin-bottom: 1rem;
        }

        .editor-content ul {
            list-style-type: disc;
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }

        .editor-content ol {
            list-style-type: decimal;
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }

        .editor-content li {
            margin-bottom: 0.5rem;
        }

        .editor-content h1,
        .editor-content h2,
        .editor-content h3,
        .editor-content h4,
        .editor-content h5,
        .editor-content h6 {
            font-weight: bold;
            margin-top: 1rem;
            margin-bottom: 0.5rem;
        }

        .editor-content table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 1rem;
        }

        .editor-content table,
        .editor-content th,
        .editor-content td {
            border: 1px solid #dee2e6;
            padding: 0.5rem;
        }

        /* Gambar horizontal grid */
        .gallery-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .gallery-grid img {
            width: 140px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
    </style>
@endsection

@section('content')

    <section
        class="relative table w-full items-center py-36 bg-[url('../../assets/images/bg/cta.jpg')] bg-top bg-no-repeat bg-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
        <div class="container relative">
        <div class="grid grid-cols-1 pb-8 text-center mt-10">
            <h3 class="text-3xl leading-normal tracking-wider font-semibold text-white">
                {{ $destinasi->title }}
            </h3>

            {{-- Tampilkan jumlah kunjungan --}}
            <p class="text-sm text-gray-300 mt-2 flex items-center justify-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                Dilihat sebanyak <strong>{{ $jumlahKunjungan }}</strong> kali
            </p>


        </div>

        </div>
        <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
            <ul class="tracking-[0.5px] mb-0 inline-block">
                <li
                    class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white">
                    <a href="{{ url('/destinasi') }}">Destinasi Wisata</a>
                </li>
                <li class="inline-block text-base text-white/50 mx-0.5"><i class="mdi mdi-chevron-right"></i></li>
                <li class="inline-block uppercase text-[13px] font-bold text-white" aria-current="page">
                    {{ $destinasi->title }}</li>
            </ul>
        </div>
    </section>
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-6">
                <div class="lg:col-span-8 md:col-span-7">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12">
                            <div class="relative overflow-hidden rounded shadow-sm">
                                <div id="viewer" class="w-full" style="width: 100%; height: 500px;"></div>
                            </div>
                        </div>

                        <div class="col-span-12 mt-4">
                            <div class="flex justify-center">
                                <div class="flex gap-2 overflow-x-auto">
                                    @foreach (json_decode($destinasi->vr_link) as $index => $vr)
                                        <img src="{{ asset('storage/' . $vr) }}" data-index="{{ $index }}"
                                            class="cursor-pointer w-24 h-16 object-cover rounded-md border hover:border-red-500 transition" />
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="flex items-center text-slate-400 font-medium mt-6">
                        <i data-feather="map-pin" class="text-red-500 size-4 me-1"></i> {{ $destinasi->location }}
                    </p>

                    <div class="mt-4">
                        <h5 class="text-lg font-semibold">Deskripsi:</h5>
                        <div class="editor-content mt-2">{!! $destinasi->description !!}</div>
                    </div>

                    <div class="mt-6">
                        <h5 class="text-lg font-semibold">Galeri:</h5>

                        @if ($galeri->isEmpty())
                            <p class="text-slate-400 mt-2">Belum ada galeri untuk destinasi ini.</p>
                        @else
                            <div class="grid grid-cols-1 relative mt-4">
                                <div class="tiny-gallery-slider">
                                    @foreach ($galeri as $foto)
                                        <div class="tiny-slide">
                                            <div class="group relative overflow-hidden rounded-md shadow-sm">
                                                <a href="{{ asset('storage/' . $foto->image) }}"
                                                    class="lightbox absolute inset-0 z-10 flex items-center justify-center opacity-0 group-hover:opacity-100 bg-black/30 duration-300">
                                                    <span
                                                        class="inline-flex justify-center items-center size-9 bg-red-500 text-white rounded-full">
                                                        <i data-feather="camera" class="size-4 align-middle"></i>
                                                    </span>
                                                </a>

                                                <img src="{{ asset('storage/' . $foto->image) }}"
                                                    class="w-full h-48 object-cover scale-125 group-hover:scale-100 duration-500"
                                                    alt="{{ $foto->title }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="mt-6">
                        <h5 class="text-lg font-semibold">Review:</h5>

                        @if ($reviews->isEmpty())
                            <p class="text-slate-400 mt-2">Belum ada review untuk destinasi ini.</p>
                        @else
                            <div class="relative mt-4">
                                <div class="tiny-review-slider">
                                    @foreach ($reviews as $review)
                                        <div class="tiny-slide px-2">
                                            <div class="flex flex-col justify-between p-3 bg-white rounded-lg shadow">
                                                <ul
                                                    class="text-sm font-medium text-amber-400 list-none flex items-center justify-center text-center">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <li class="inline">
                                                            <i
                                                                class="mdi mdi-star {{ $i <= $review->rating ? '' : 'text-gray-300' }}"></i>
                                                        </li>
                                                    @endfor
                                                    <li class="inline text-slate-900 text-xs ms-2">
                                                        {{ number_format($review->rating, 1) }}
                                                    </li>
                                                </ul>


                                                <blockquote
                                                    class="mt-2 italic text-sm text-gray-700 leading-snug text-center">
                                                    “{{ $review->review }}”
                                                </blockquote>

                                                <p class="mt-2 text-gray-900 text-sm font-semibold text-center">
                                                    {{ $review->user->name ?? 'Anonymous' }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="lg:col-span-4 md:col-span-5">
                    <div class="p-4 rounded-md shadow-sm sticky top-20 bg-white">
                        <div class="mb-6">
                            <h5 class="text-lg font-medium text-gray-900 mb-3">Review Anda</h5>

                            @auth
                                <div id="review-form-container">
                                    <form id="review-form" action="{{ route('review.store') }}" method="POST" class="space-y-3">
                                        @csrf
                                        <div>
                                            <ul class="text-lg font-medium text-amber-400 list-none flex items-center space-x-1">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <li class="inline cursor-pointer">
                                                        <input type="radio" name="rating" id="star-{{ $i }}" value="{{ $i }}" class="sr-only peer" required>
                                                        <label for="star-{{ $i }}">
                                                            <i id="star-{{ $i }}-icon" class="mdi mdi-star align-middle text-gray-300 peer-checked:text-amber-400"></i>
                                                        </label>
                                                    </li>
                                                @endfor
                                                <li class="inline text-slate-900 text-sm ms-1" id="rating-value">0.0</li>
                                            </ul>
                                        </div>

                                        <div>
                                            <textarea id="review" name="review" rows="4" maxlength="60"
                                                class="w-full px-3 py-2 border border-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-red-500"
                                                placeholder="Tulis review Anda di sini maksimal 60 karakter..." required></textarea>
                                        </div>

                                        <div>
                                            <button type="submit"
                                                class="w-full px-6 py-2 mt-4 bg-red-500 text-white font-medium rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 transition">
                                                Kirim Review
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div id="user-review-container" class="hidden p-1 bg-gray-100 rounded-md">
                                    <!-- Rating + Edit button -->
                                    <div class="flex items-center justify-between text-amber-400 text-lg mb-1">
                                        <div class="flex items-center gap-1">
                                            <div id="user-rating" class="flex"></div>
                                            <div id="user-rating-value" class="text-gray-900 text-sm font-semibold ml-1"></div>
                                        </div>
                                        <button id="edit-review-btn" type="button"
                                            class="text-red-500 text-sm font-medium hover:underline hover:text-red-600 transition">
                                            (Edit)
                                        </button>
                                    </div>

                                    <!-- Review Text -->
                                    <div class="text-gray-700 text-sm mb-4 leading-relaxed">
                                        <div id="user-text"></div>
                                    </div>
                                </div>
                            @endauth

                            @guest
                                <div class="border border-gray-300 p-3 text-sm  text-slate-700 rounded-md">
                                    <p>Silakan <a href="{{ route('login') }}" class="text-red-600 hover:text-red-800 underline">login</a>
                                        terlebih dahulu untuk memberikan review.</p>
                                </div>
                            @endguest
                        </div>

                        <div class="mt-8">
                            <h5 class="text-lg font-medium text-gray-900 mb-3">Tour Map</h5>

                            <div class="rounded-lg overflow-hidden">
                                <iframe
                                    src="https://www.google.com/maps?q={{ urlencode($destinasi->location) }}&output=embed"
                                    class="w-full h-[300px]" style="border:0" allowfullscreen="" loading="lazy">
                                </iframe>
                            </div>

                            <div class="flex justify-center">
                                <a href="https://www.google.com/maps/dir/?api=1&destination={{ urlencode($destinasi->location) }}"
                                    target="_blank"
                                    class="w-full text-center mt-4 px-6 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-600 transition">
                                    Arahkan ke Tempat
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const vrImages = @json(json_decode($destinasi->vr_link));
            let currentIndex = 0;

            if (!vrImages || vrImages.length === 0) {
                console.error('Tidak ada gambar 360 tersedia.');
                return;
            }

            const viewer = new PhotoSphereViewer.Viewer({
                container: document.querySelector('#viewer'),
                panorama: "{{ asset('storage') }}/" + vrImages[currentIndex],
            });

            // Tambahkan event listener untuk semua thumbnail
            document.querySelectorAll('img[data-index]').forEach(img => {
                img.addEventListener('click', function() {
                    const index = parseInt(this.dataset.index);
                    currentIndex = index;
                    viewer.setPanorama("{{ asset('storage') }}/" + vrImages[currentIndex]);
                });
            });
        });



        document.addEventListener('DOMContentLoaded', function () {
            const ratingInputs = document.querySelectorAll('input[name="rating"]');
            const ratingValue = document.getElementById('rating-value');
            const reviewForm = document.getElementById('review-form');
            const reviewFormContainer = document.getElementById('review-form-container');
            const userReviewContainer = document.getElementById('user-review-container');
            const userRating = document.getElementById('user-rating');
            const userText = document.getElementById('user-text');
            const editReviewBtn = document.getElementById('edit-review-btn');
            const reviewTextarea = document.getElementById('review');

            let currentReview = null;

            ratingInputs.forEach(input => {
                input.addEventListener('change', function () {
                    ratingValue.textContent = this.value + '.0';
                });
            });

            function showUserReview(rating, text) {
                reviewFormContainer.classList.add('hidden');
                userReviewContainer.classList.remove('hidden');
                userRating.innerHTML = '★'.repeat(rating);
                document.getElementById('user-rating-value').textContent = rating + '.0';
                userText.textContent = text;
            }

            function showEditForm(rating, text) {
                reviewFormContainer.classList.remove('hidden');
                userReviewContainer.classList.add('hidden');

                document.querySelector('input[name="rating"][value="' + rating + '"]').checked = true;
                ratingValue.textContent = rating + '.0';
                reviewTextarea.value = text;
            }

            reviewForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const selectedRating = document.querySelector('input[name="rating"]:checked')?.value;
                const reviewText = reviewTextarea.value;

                if (!selectedRating) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Rating belum dipilih',
                        text: 'Mohon pilih rating terlebih dahulu.'
                    });
                    return;
                }

                if (reviewText.trim() === '') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Review kosong',
                        text: 'Review tidak boleh kosong.'
                    });
                    return;
                }

                const method = currentReview ? 'PUT' : 'POST';
                const url = currentReview ? `/review/${currentReview.id}` : '{{ route('review.store') }}';

                fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        destinasi_slug: "{{ $destinasi->slug }}", 
                        rating: selectedRating,
                        review: reviewText
                    })
                    
                })
                .then(response => {
                    if (!response.ok) throw new Error('Gagal submit review');
                    return response.json();
                })
                .then(data => {
                    const isUpdate = !!currentReview; // simpan kondisi sebelum update
                    currentReview = data.review;
                    showUserReview(selectedRating, reviewText);
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: isUpdate ? 'Review berhasil diperbarui!' : 'Review berhasil disimpan!',
                        confirmButtonText: 'Oke'
                    });
                })

                .catch(error => {
                    console.error(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'Silakan coba lagi.'
                    });
                });
            });

            editReviewBtn.addEventListener('click', function () {
                if (currentReview) {
                    showEditForm(currentReview.rating, currentReview.review);
                }
            });

            fetch('{{ route('review.my', $destinasi->slug) }}')
                .then(response => response.json())
                .then(review => {
                    if (review && review.rating && review.review) {
                        currentReview = review;
                        showUserReview(review.rating, review.review);
                    }
                })
                .catch(error => {
                    console.error('Gagal mengambil review:', error);
                });
        });
    </script>
@endsection
