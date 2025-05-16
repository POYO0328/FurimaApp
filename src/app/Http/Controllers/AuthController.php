<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class AuthController extends Controller
{
    public function index()
    {
    $items = Item::all(); // 全件取得
        return view('index', compact('items')); // ビューに渡す
    }
}
