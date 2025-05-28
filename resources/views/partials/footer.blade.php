        <!-- Footer Start -->
        <footer class="footer bg-slate-900 relative text-gray-200">
            <div class="container relative">
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <div class="py-[30px] px-0">
                            <div class="grid md:grid-cols-12 grid-cols-1 gap-6">
                                <div class="lg:col-span-3 md:col-span-12">
                                    <a href="#" class="text-[22px] focus:outline-none">
                                        <img src="{{ asset('assets/images/logo-light.png') }}" alt="">
                                    </a>
                                    <p class="mt-6 text-gray-300">Wakatobi merupakan singkatan dari empat pulau utama:
                                        Wangi-Wangi, Kaledupa, Tomia, dan Binongko.</p>
                                    <ul class="list-none mt-6">
                                        <li class="inline"><a href="https://www.facebook.com/shreethemes"
                                                target="_blank"
                                                class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i
                                                    data-feather="facebook" class="size-4 align-middle"
                                                    title="facebook"></i></a></li>
                                        <li class="inline"><a href="https://www.instagram.com/shreethemes/"
                                                target="_blank"
                                                class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i
                                                    data-feather="instagram" class="size-4 align-middle"
                                                    title="instagram"></i></a></li>
                                        <li class="inline"><a href="https://twitter.com/shreethemes" target="_blank"
                                                class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i
                                                    data-feather="twitter" class="size-4 align-middle"
                                                    title="twitter"></i></a></li>
                                        <li class="inline"><a href="mailto:support@shreethemes.in"
                                                class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i
                                                    data-feather="mail" class="size-4 align-middle"
                                                    title="email"></i></a></li>
                                    </ul><!--end icon-->
                                </div><!--end col-->

                                <div class="lg:col-span-3 md:col-span-4">
                                    <div class="lg:ms-8">
                                        <h5 class="tracking-[1px] text-gray-100 font-semibold mb-6">Alamat</h5>

                                        <div class="flex mt-4">
                                            <i data-feather="map-pin" class="size-4 text-red-500 me-2 mt-1"></i>
                                            <div class="">
                                                <h6 class="text-gray-300">Jl. Laruku No.11, Mandati III, <br> Kabupaten
                                                    Wakatobi, <br> Sulawesi Tenggara, 93795</h6>
                                            </div>
                                        </div>

                                        <div class="flex mt-4">
                                            <i data-feather="mail" class="size-4 text-red-500 me-2 mt-1"></i>
                                            <div class="">
                                                <a href="mailto:contact@example.com"
                                                    class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out">sarwan@gmail.com</a>
                                            </div>
                                        </div>

                                        <div class="flex mt-4">
                                            <i data-feather="phone" class="size-4 text-red-500 me-2 mt-1"></i>
                                            <div class="">
                                                <a href="tel:+152534-468-854"
                                                    class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out">+62
                                                    853-3800-8197</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="lg:col-span-3 md:col-span-4">
                                    <div class="lg:ms-8">
                                        <h5 class="tracking-[1px] text-gray-100 font-semibold">Menu</h5>
                                        <ul class="list-none footer-list mt-6">
                                            <li class="mt-[10px]"><a href="{{ url('/destinasi') }}"
                                                    class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                        class="mdi mdi-chevron-right"></i> Destinasi</a></li>
                                            <li class="mt-[10px]"><a href="{{ url('/blog') }}"
                                                    class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                        class="mdi mdi-chevron-right"></i> Memoar Wisata</a></li>
                                            <li class="mt-[10px]"><a href="{{ url('/galeri') }}"
                                                    class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                        class="mdi mdi-chevron-right"></i> Galeri</a></li>
                                            <li class="mt-[10px]"><a href="{{ url('/akomodasi') }}"
                                                    class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                        class="mdi mdi-chevron-right"></i> Akomodasi Wisata</a></li>
                                            <li class="mt-[10px]"><a href="{{ url('/penyedia-tur') }}"
                                                    class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                        class="mdi mdi-chevron-right"></i> Operator Tur & Selam</a></li>
                                        </ul>
                                    </div>
                                </div><!--end col-->


                                <div class="lg:col-span-3 md:col-span-4">
                                    <h5 class="tracking-[1px] text-gray-100 font-semibold">Berlangganan Info Wisata</h5>
                                    <form>
                                        <div class="grid grid-cols-1">
                                            <div class="my-3">
                                                <label class="form-label text-sm text-gray-300">Masukkan email Anda
                                                    <span class="text-red-600">*</span></label>
                                                <div class="form-icon relative mt-2">
                                                    <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>
                                                    <input type="email"
                                                        class="ps-12 rounded w-full py-2 px-3 h-10 bg-gray-800 border-0 text-gray-100 focus:shadow-none focus:ring-0 placeholder:text-gray-400 outline-none"
                                                        placeholder="contoh@email.com" name="email" required>
                                                </div>
                                            </div>

                                            <button type="submit" id="submitsubscribe" name="send"
                                                class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md hover:bg-red-600">
                                                Berlangganan
                                            </button>
                                        </div>
                                    </form>
                                </div><!--end col-->

                            </div><!--end grid-->
                        </div><!--end col-->
                    </div>
                </div><!--end grid-->
            </div><!--end container-->

            <div class="py-[30px] px-0 border-t border-gray-800">
                <div class="container relative text-center">
                    <div class="grid grid-cols-1">
                        <div class="text-center">
                            <p class="mb-0">©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Wakatobi. Desain <i
                                    class="mdi mdi-heart text-red-600"></i> by <a
                                    href="https://www.linkedin.com/in/sarwan-hamid/" target="_blank"
                                    class="text-reset">Sarwan Hamid</a>.
                            </p>
                        </div>
                    </div><!--end grid-->
                </div><!--end container-->
            </div>
        </footer><!--end footer-->
        <!-- Footer End -->
