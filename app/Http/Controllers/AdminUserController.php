<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Menampilkan semua user dengan role 'user'.
     */
    public function index()
    {
        $users = User::where('role', 'user')->latest()->paginate(5);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Menghapus akun user.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('delete_success', 'Akun user berhasil dihapus!');
    }
}
