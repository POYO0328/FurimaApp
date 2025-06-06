<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function complete(Request $request, $item_id)
    {
        $request->validate([
            'payment_method' => 'required|string|in:コンビニ払い,クレジットカード',
        ]);

        $user = Auth::user();

        Purchase::create([
            'user_id' => $user->id,
            'item_id' => $item_id,
            'payment_method' => $request->payment_method,
        ]);

        return redirect('/mypage?page=buy')->with('success', '購入が完了しました');
    }

    public function confirm($item_id)
    {
        $item = Item::findOrFail($item_id);
        $user = Auth::user();

        return view('item.purchase', compact('item', 'user', 'item_id'));
    }
}
