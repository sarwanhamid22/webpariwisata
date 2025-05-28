<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminSettingController extends Controller
{
    public function edit()
    {
        $admin = Auth::user();
        return view('admin.setting', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = Auth::user();

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'new_password' => 'nullable|min:6|confirmed',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('profile', 'public');
            if ($admin->image) {
                Storage::disk('public')->delete($admin->image);
            }
            $admin->image = $path;
        }

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->filled('new_password')) {
            if (!Hash::check($request->old_password, $admin->password)) {
                return back()->withErrors(['old_password' => 'Password lama tidak sesuai.']);
            }
            $admin->password = Hash::make($request->new_password);
        }

        /** @var \App\Models\User $admin */
        $admin->save();

        return redirect()->route('admin.setting.edit')->with('success', 'Profil admin berhasil diperbarui!');
    }
}
