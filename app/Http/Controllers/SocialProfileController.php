<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialProfile;
use Illuminate\Support\Facades\Auth;

class SocialProfileController extends Controller
{
    /**
     * Tampilkan form untuk mengubah Social Profile.
     */
    public function edit()
    {
        // Ambil atau buat data social profile untuk user yang sedang login
        $profile = SocialProfile::firstOrCreate(
            ['user_id' => Auth::id()],
            [] // default values jika belum ada
        );
        return view('users.social', compact('profile'));
    }

    /**
     * Perbarui data Social Profile.
     */
    public function update(Request $request)
    {
        // Validasi data URL
        $validated = $request->validate([
            'facebook'  => 'nullable|string|max:255',
            'twitter'   => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'youtube'   => 'nullable|string|max:255',
        ]);

        $profile = SocialProfile::firstOrCreate(
            ['user_id' => Auth::id()],
            []
        );

        $profile->update($validated);

        return redirect('/user/social')->with('success', 'Akun media sosial berhasil diperbarui!');
    }
}
