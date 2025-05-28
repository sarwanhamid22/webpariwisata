@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')

        <!-- Google Map -->
        <div class="container-fluid relative mt-20">
            <div class="grid grid-cols-1">
                <div class="w-full leading-[0] border-0">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15939.847122384612!2d123.5403287052634!3d-5.341490799999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2da13349e01be357%3A0x788f0aaf44cbb09!2sDinas%20Pariwisata%20dan%20Ekonomi%20Kreatif%20Wakatobi!5e0!3m2!1sid!2sid!4v1715788728250!5m2!1sid!2sid" 
                        style="border:0;" 
                        class="w-full h-[500px]" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

            </div><!--end grid-->
        </div><!--end container-->
        <!-- Google Map -->

        <!-- Start Section-->
        <section class="relative lg:py-24 py-16">
            <div class="container">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6">
                    <div class="lg:col-span-7 md:col-span-6">
                        <img src="assets/images/travel-train-station.svg" class="w-full max-w-[500px] mx-auto" alt="">
                    </div>

                <div class="lg:col-span-5 md:col-span-6">
                    <div class="lg:ms-5">
                        <div class="bg-white dark:bg-slate-900 rounded-md shadow-sm dark:shadow-gray-800 p-6">
                            <h3 class="mb-6 text-2xl leading-normal font-semibold">Hubungi Kami!</h3>

                            @if (session('success'))
                                <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('kontak.kirim') }}">
                                @csrf
                                <div class="grid lg:grid-cols-12 grid-cols-1 gap-3">
                                    <div class="lg:col-span-6">
                                        <label for="name" class="font-semibold">Nama Anda:</label>
                                        <input name="nama" id="name" type="text" class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Nama :">
                                    </div>

                                    <div class="lg:col-span-6">
                                        <label for="email" class="font-semibold">Email Anda:</label>
                                        <input name="email" id="email" type="email" class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Email :">
                                    </div>

                                    <div class="lg:col-span-12">
                                        <label for="subject" class="font-semibold">Pertanyaan Anda:</label>
                                        <input name="subject" id="subject" class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Subjek :">
                                    </div>

                                    <div class="lg:col-span-12">
                                        <label for="comments" class="font-semibold">Pesan Anda:</label>
                                        <textarea name="pesan" id="comments" class="mt-2 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Tulis pesan Anda di sini..."></textarea>
                                    </div>
                                </div>

                                <button type="submit" id="submit" name="send" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md mt-2">Kirim Pesan</button>
                            </form>
                        </div>

                    </div>
                </div>

                </div>
            </div><!--end container-->
            
        <div class="container lg:mt-24 mt-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Telepon -->
                <div class="text-center px-6">
                    <div class="size-20 bg-red-500/5 text-red-500 rounded-xl text-2xl flex justify-center items-center mx-auto shadow-xs dark:shadow-gray-800">
                        <i data-feather="phone"></i>
                    </div>
                    <div class="content mt-6">
                        <h5 class="text-lg font-semibold">Telepon</h5>
                        <p class="text-slate-400 mt-3">Hubungi kami melalui WhatsApp atau telepon untuk informasi lebih lanjut mengenai wisata di Wakatobi.</p>
                        <div class="mt-4">
                            <a href="tel:+6285338008197" class="text-red-500 font-medium">+62-853-3800-8197</a>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="text-center px-6">
                    <div class="size-20 bg-red-500/5 text-red-500 rounded-xl text-2xl flex justify-center items-center mx-auto shadow-xs dark:shadow-gray-800">
                        <i data-feather="mail"></i>
                    </div>
                    <div class="content mt-6">
                        <h5 class="text-lg font-semibold">Email</h5>
                        <p class="text-slate-400 mt-3">Kirimkan pertanyaan atau kerja sama melalui email resmi kami.</p>
                        <div class="mt-4">
                            <a href="mailto:sarwan@gmail.com" class="text-red-500 font-medium">sarwan@gmail.com</a>
                        </div>
                    </div>
                </div>

                <!-- Lokasi -->
                <div class="text-center px-6">
                    <div class="size-20 bg-red-500/5 text-red-500 rounded-xl text-2xl flex justify-center items-center mx-auto shadow-xs dark:shadow-gray-800">
                        <i data-feather="map-pin"></i>
                    </div>
                    <div class="content mt-6">
                        <h5 class="text-lg font-semibold">Lokasi</h5>
                        <p class="text-slate-400 mt-3 leading-relaxed">
                            Jl. Laruku No.11, Mandati III,<br>Kabupaten Wakatobi, Sulawesi Tenggara, 93795
                        </p>
                        <div class="mt-4">
                            <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15939.847122384612!2d123.5403287052634!3d-5.341490799999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2da13349e01be357%3A0x788f0aaf44cbb09!2sDinas%20Pariwisata%20dan%20Ekonomi%20Kreatif%20Wakatobi!5e0!3m2!1sid!2sid!4v1715788728250!5m2!1sid!2sid"
                            target="_blank"
                            class="text-red-500 font-medium underline">
                                Lihat di Google Maps
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </section><!--end section-->
        <!-- End Section-->

@endsection
