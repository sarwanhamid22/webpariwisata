@extends('layouts.appUser')

@section('title', 'Pengaturan Media Sosial')

@section('content')
    <section class="relative md:px-3 mt-6 md:mt-0">
        <div class="container mx-auto px-4">
            <div class="space-y-6">
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
                                <span class="text-slate-700">Sosial Media</span>
                            </li>
                        </ul>
                    </div>

                    <h5 class="text-lg font-semibold mb-4 text-slate-900 dark:text-white">Sosial Media</h5>

                    <form action="{{ route('user.social.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="p-6">
                            <!-- Twitter -->
                            <div class="md:flex items-center">
                                <div class="md:w-1/3">
                                    <span class="font-medium text-slate-900 dark:text-white">Twitter</span>
                                </div>
                                <div class="md:w-2/3 mt-4 md:mt-0">
                                    <div class="form-icon relative">
                                        <i data-feather="twitter" class="w-4 h-4 absolute top-3 start-4 text-slate-400"></i>
                                        <input type="text" name="twitter" id="twitter"
                                            value="{{ old('twitter', $profile->twitter ?? '') }}"
                                            placeholder="Twitter Profile Name" required
                                            class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded border border-gray-100 dark:border-gray-800 focus:ring-0">
                                    </div>
                                    <p class="text-slate-400 mt-1 text-sm">Add your Twitter username.</p>
                                </div>
                            </div>

                            <!-- Facebook -->
                            <div class="md:flex items-center mt-6">
                                <div class="md:w-1/3">
                                    <span class="font-medium text-slate-900 dark:text-white">Facebook</span>
                                </div>
                                <div class="md:w-2/3 mt-4 md:mt-0">
                                    <div class="form-icon relative">
                                        <i data-feather="facebook"
                                            class="w-4 h-4 absolute top-3 start-4 text-slate-400"></i>
                                        <input type="text" name="facebook" id="facebook"
                                            value="{{ old('facebook', $profile->facebook ?? '') }}"
                                            placeholder="Facebook Profile Name" required
                                            class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded border border-gray-100 dark:border-gray-800 focus:ring-0">
                                    </div>
                                    <p class="text-slate-400 mt-1 text-sm">Add your Facebook username.</p>
                                </div>
                            </div>

                            <!-- Instagram -->
                            <div class="md:flex items-center mt-6">
                                <div class="md:w-1/3">
                                    <span class="font-medium text-slate-900 dark:text-white">Instagram</span>
                                </div>
                                <div class="md:w-2/3 mt-4 md:mt-0">
                                    <div class="form-icon relative">
                                        <i data-feather="instagram"
                                            class="w-4 h-4 absolute top-3 start-4 text-slate-400"></i>
                                        <input type="text" name="instagram" id="instagram"
                                            value="{{ old('instagram', $profile->instagram ?? '') }}"
                                            placeholder="Instagram Profile Name" required
                                            class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded border border-gray-100 dark:border-gray-800 focus:ring-0">
                                    </div>
                                    <p class="text-slate-400 mt-1 text-sm">Add your Instagram username.</p>
                                </div>
                            </div>

                            <!-- Youtube -->
                            <div class="md:flex items-center mt-6">
                                <div class="md:w-1/3">
                                    <span class="font-medium text-slate-900 dark:text-white">Youtube</span>
                                </div>
                                <div class="md:w-2/3 mt-4 md:mt-0">
                                    <div class="form-icon relative">
                                        <i data-feather="youtube" class="w-4 h-4 absolute top-3 start-4 text-slate-400"></i>
                                        <input type="text" name="youtube" id="youtube"
                                            value="{{ old('youtube', $profile->youtube ?? '') }}"
                                            placeholder="Youtube Channel URL" required
                                            class="ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded border border-gray-100 dark:border-gray-800 focus:ring-0">
                                    </div>
                                    <p class="text-slate-400 mt-1 text-sm">Add your Youtube channel URL.</p>
                                </div>
                            </div>

                            <!-- Tombol Simpan -->
                            <div class="md:flex mt-8">
                                <div class="w-full text-right">
                                    <button type="submit"
                                        class="py-2 px-5 inline-block font-semibold tracking-wide text-base text-center bg-red-500 hover:bg-red-600 text-white rounded-md transition duration-500">
                                        Simpan Social Profilemu
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
