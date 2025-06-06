<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{  
    public function show($id)
    {
        $item = Item::findOrFail($id);
        //コメントを渡す
        $comments = Comment::where('items_id', $id)->with('user')->latest()->get();
        $likeCount = Like::where('items_id', $id)->count();
        

        $user = Auth::user();
        $isLiked = false;

        if ($user) {
            $isLiked = Like::where('user_id', $user->id)
                        ->where('items_id', $id)
                        ->exists();
        }

        return view('item.show', compact('item', 'comments', 'likeCount', 'isLiked'));
    }

    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'item_name'   => 'required|string|max:255',
            'price'       => 'required|integer|min:0',
            'brand'       => 'nullable|string|max:255',
            'condition'   => 'required|string',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:2048', // 最大2MB
        ]);

        // 画像の保存処理
        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('public/images');
            $validated['image_path'] = str_replace('public/', 'storage/', $validated['image_path']);
        }

        // 保存
        Item::create($validated);

        return redirect('/')->with('success', '商品を出品しました！');
    }
}
