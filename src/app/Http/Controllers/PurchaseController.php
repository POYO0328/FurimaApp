<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class PurchaseController extends Controller
{
    public function confirm($item_id)
    {
        $item = Item::findOrFail($item_id);
        $user = Auth::user();

        return view('item.purchase', compact('item', 'user', 'item_id'));
    }
}
