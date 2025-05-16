<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('mypage.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'building_name' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|max:2048', // 画像アップロード対応
        ]);

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $path;
        }

        $user->name = $validated['name'];
        $user->postal_code = $validated['postal_code'];
        $user->address = $validated['address'];
        $user->building_name = $validated['building'];

        // 初回ログインフラグが1だったら0にする
        if ($user->first_login_flg) {
            $user->first_login_flg = false;
        }

        $user->save();

        // 初回かどうかでリダイレクト先を変更
        if ($user->wasChanged('first_login_flg')) {
            return redirect('/'); // 初回更新後はTOPへ
        }

        return redirect()->route('profile.edit')->with('success', 'プロフィールを更新しました');
    }
}
