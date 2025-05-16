<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class MypageController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // ユーザー情報取得
        return view('mypage.index', compact('user'));

        // エラーを防ぐためにnullチェックを加えておくと安全
        $items = $user ? Item::where('user_id', $user->id)->get() : collect();

        return view('mypage.index', compact('user', 'items'));
    }
}
