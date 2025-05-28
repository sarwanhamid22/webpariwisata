@extends('layouts.appUser')

@section('title', 'Riwayat Review')

@section('content')
<section class="relative md:px-3 mt-6 md:mt-0">
  <div class="container mx-auto px-4">
    <div class="space-y-6">
      <div class="p-6 rounded-md shadow-sm bg-white dark:bg-slate-900">
        <div class="overflow-x-auto rounded-md">
          <table class="min-w-full table-fixed divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100 dark:bg-slate-800">
              <tr>
                <th class="w-1/4 px-6 py-3 text-left font-semibold text-gray-700 dark:text-white uppercase tracking-wider">Destinasi</th>
                <th class="w-1/6 px-6 py-3 text-left font-semibold text-gray-700 dark:text-white uppercase tracking-wider">Rating</th>
                <th class="w-2/6 px-6 py-3 text-left font-semibold text-gray-700 dark:text-white uppercase tracking-wider">Review</th>
                <th class="w-1/6 px-6 py-3 text-center font-semibold text-gray-700 dark:text-white uppercase tracking-wider">Aksi</th>
              </tr>
            </thead>
            <tbody class="bg-white dark:bg-slate-900 divide-y divide-gray-200 dark:divide-gray-700">
              @forelse ($reviews as $review)
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-slate-700 dark:text-white">{{ $review->destinasi->title ?? '-' }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-slate-700 dark:text-white">{{ number_format($review->rating, 1) }} ⭐</td>
                  <td class="px-6 py-4 whitespace-normal text-slate-700 dark:text-white">{{ $review->review }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-center">
                    <div class="flex items-center justify-center gap-2">
                      <!-- Tombol Edit -->
                      <a href="{{ route('user.review.edit', $review->id) }}"
                        title="Edit"
                        class="p-2 bg-white/70 dark:bg-slate-800 text-orange-500
                               hover:bg-orange-500 hover:text-white rounded-full shadow transition-all duration-300 active:scale-95">
                        <i data-feather="edit-2" class="w-4 h-4"></i>
                      </a>

                      <!-- Tombol Delete -->
                      <form id="deleteReviewForm-{{ $review->id }}" action="{{ route('user.review.destroy', $review->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button"
                                class="p-2 bg-white/70 dark:bg-slate-800 text-red-500
                                       hover:bg-red-500 hover:text-white rounded-full shadow transition-all duration-300 active:scale-95 btn-delete"
                                data-form-id="deleteReviewForm-{{ $review->id }}"
                                title="Delete">
                            <i data-feather="trash-2" class="w-4 h-4"></i>
                        </button>
                    </form>
                    
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="4" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                    Belum ada review.
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</section>
@endsection
