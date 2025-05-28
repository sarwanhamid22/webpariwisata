<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserBlogController;
use App\Http\Controllers\UserGaleriController;
use App\Http\Controllers\SocialProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDestinasiController;
use App\Http\Controllers\AdminMemoarController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\AkomodasiController;
use App\Http\Controllers\AdminAkomodasiController;
use App\Http\Controllers\PenyediaTurController;
use App\Http\Controllers\AdminPenyediaTurController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KontakController;



Route::get('/', [BerandaController::class, 'index']);


Route::get('/transportasi', function () {
    return view('transportasi.index');
})->name('transportasi');
Route::get('/tentang-wakatobi', function () {
    return view('tentangkami.index');
})->name('tentang.wakatobi');

Route::get('/destinasi', [DestinasiController::class, 'index'])->name('destinasi.index');
Route::get('/destinasi/{slug}', [DestinasiController::class, 'show'])->name('destinasi.show');
Route::post('/review', [ReviewController::class, 'store'])->middleware('auth')->name('review.store');
Route::get('/review/{destinasi_id}', [ReviewController::class, 'index'])->name('review.index');
Route::get('/my-review/{destinasi_id}', [ReviewController::class, 'showUserReview'])->middleware('auth')->name('review.my');
Route::put('/review/{review}', [ReviewController::class, 'update'])->middleware('auth')->name('review.update');
Route::get('/akomodasi', [AkomodasiController::class, 'index'])->name('akomodasi.index');
Route::get('/akomodasi/{slug}', [AkomodasiController::class, 'show'])->name('akomodasi.show');
Route::get('/penyedia-tur', [PenyediaTurController::class, 'index'])->name('penyedia-tur.index');
Route::get('/penyedia-tur/{slug}', [PenyediaTurController::class, 'show'])->name('penyedia-tur.show');
Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::post('/kontak-kami', [KontakController::class, 'kirim'])->name('kontak.kirim');
Route::get('/kontak-kami', [KontakController::class, 'index'])->name('kontak.index');

Route::middleware('auth', 'verifiedUnlessGoogle')->group(function () {
    Route::get('/user/profile', [UserController::class, 'edit'])->name('user.profile.edit');
    Route::put('/user/profile', [UserController::class, 'update'])->name('user.profile.update');
    Route::delete('/user/profile', [UserController::class, 'destroy'])->name('user.profile.delete');
    Route::resource('/user/blog', UserBlogController::class)->names('user.blog');
    Route::resource('/user/galeri', UserGaleriController::class)->names('user.galeri');
    Route::get('/user/social', [SocialProfileController::class, 'edit'])->name('user.social.edit');
    Route::put('/user/social', [SocialProfileController::class, 'update'])->name('user.social.update');
    Route::resource('/user/review', UserReviewController::class)->except(['show'])->names('user.review');
});


Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/dashboard/hero', [DashboardController::class, 'storeMultiHeroSlide'])->name('admin.hero.store.multi');
    Route::delete('/admin/dashboard/hero/{group_id}', [DashboardController::class, 'destroyHeroSlideGroup'])->name('admin.hero.destroy');
    Route::resource('destinasi', AdminDestinasiController::class, ['as' => 'admin']);
    Route::resource('memoar', AdminMemoarController::class, ['as' => 'admin'])->only(['index', 'show', 'destroy']);
    Route::put('/admin/memoar/{id}/status', [AdminMemoarController::class, 'updateStatus'])->name('admin.memoar.updateStatus');
    Route::resource('galeri', AdminGaleriController::class, ['as' => 'admin'])->only(['index', 'show', 'destroy']);
    Route::put('/admin/galeri/{id}/status', [AdminGaleriController::class, 'updateStatus'])->name('admin.galeri.updateStatus');
    Route::resource('akomodasi', AdminAkomodasiController::class, ['as' => 'admin']);
    Route::resource('penyedia-tur', AdminPenyediaTurController::class, ['as' => 'admin']);
    Route::resource('user', AdminUserController::class, ['as' => 'admin'])->only(['index', 'destroy']);
    Route::resource('review', AdminReviewController::class, ['as' => 'admin'])->only(['index', 'destroy']);
    Route::get('setting', [AdminSettingController::class, 'edit'])->name('admin.setting.edit');
    Route::post('setting/update', [AdminSettingController::class, 'update'])->name('admin.setting.update');
});




require __DIR__ . '/auth.php';
