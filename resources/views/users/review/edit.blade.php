@extends('layouts.appUser')

@section('title', 'Edit Review')


@section('content')
    <section class="relative md:px-3 mt-6 md:mt-0">
        <div class="container mx-auto px-4">
            <div class="space-y-6">
                <div class="p-6 rounded-xl shadow bg-white dark:bg-slate-900 border border-gray-100 dark:border-slate-800">

                    <!-- Breadcrumb -->
                    <div class="text-[13px] font-normal tracking-[0.5px] mb-8">
                        <ul class="flex items-center space-x-1">
                            <li>
                                <a href="{{ url('/') }}"
                                    class="text-slate-500 hover:text-slate-800 duration-300">Beranda</a>
                            </li>
                            <li>
                                <i class="mdi mdi-chevron-right text-slate-400 text-sm"></i>
                            </li>
                            <li>
                                <a href="{{ route('user.review.index') }}"
                                    class="text-slate-500 hover:text-slate-800 duration-300">Riwayat Review</a>
                            </li>
                            <li>
                                <i class="mdi mdi-chevron-right text-slate-400 text-sm"></i>
                            </li>
                            <li>
                                <span class="text-slate-700">Edit</span>
                            </li>
                        </ul>
                    </div>

                    <h5 class="text-lg font-semibold mb-6 text-slate-900 dark:text-white">Edit Review</h5>

                    <form action="{{ route('user.review.update', $review->id) }}" method="POST" class="gap-4">
                        @csrf
                        @method('PUT')

                        <!-- Destinasi -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-slate-600 dark:text-slate-300">Destinasi</label>
                            <input type="text" value="{{ $review->destinasi->title ?? '-' }}" disabled
                                class="w-full px-4 py-2 rounded-md bg-gray-100 dark:bg-slate-800 text-slate-800 dark:text-white border border-gray-200 dark:border-slate-700 focus:outline-none focus:ring-1 focus:ring-red-500">
                        </div>

                        <!-- Rating -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-slate-600 dark:text-slate-300 mt-2">Rating</label>
                            <select name="rating" required
                                class="w-full px-4 py-2 rounded-md bg-white dark:bg-slate-800 text-slate-800 dark:text-white border border-gray-200 dark:border-slate-700 focus:outline-none focus:ring-1 focus:ring-red-500">
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ $review->rating == $i ? 'selected' : '' }}>
                                        {{ $i }} - {{ str_repeat('⭐', $i) }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <!-- Review -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-slate-600 dark:text-slate-300 mt-2">Review</label>
                            <textarea name="review" rows="4" maxlength="60" required
                                class="w-full px-4 py-2 rounded-md bg-white dark:bg-slate-800 text-slate-800 dark:text-white border border-gray-200 dark:border-slate-700 focus:outline-none focus:ring-1 focus:ring-red-500">{{ old('review', $review->review) }}</textarea>
                        </div>

                        <!-- Tombol -->
                        <div class="flex justify-end pt-3">
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2 bg-red-500 text-white font-semibold rounded-md shadow-sm hover:bg-red-600 transition duration-200">
                                Perbaharui Review
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
