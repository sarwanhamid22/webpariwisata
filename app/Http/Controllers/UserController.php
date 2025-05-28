<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            // Untuk password, gunakan aturan confirmed sehingga harus ada new_password_confirmation
            'new_password' => 'nullable|min:6|confirmed',
        ]);

        // Update foto profil jika ada file
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('profile', 'public');
            // Hapus foto lama jika ada
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $user->image = $path;
        }

        // Update data pribadi
        $user->name = $request->name;
        $user->email = $request->email;

        // Update password jika field new_password diisi dan validasi konfirmasi terpenuhi
        if ($request->filled('new_password')) {
            if (!Hash::check($request->old_password, $user->password)) {
                return back()->withErrors(['old_password' => 'Password lama tidak sesuai.']);
            }
            $user->password = Hash::make($request->new_password);
        }

        /** @var \App\Models\User $user */
        $user->save();

        return redirect()->route('user.profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }

    public function destroy()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->delete();
        Auth::logout();
        return redirect('/')->with('delete_success', 'Akun Anda telah berhasil dihapus.');
    }
}
