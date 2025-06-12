<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseAddressController extends Controller
{
    public function showForm($item_id)
    {
        return view('item.address', compact('item_id'));
    }

    public function submitAddress(Request $request, $item_id)
    {
        $request->validate([
            'postal_code' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
        ]);

        session([
            'purchase_address' => [
                'postal_code' => $request->postal_code,
                'address' => $request->address,
                'building' => $request->building,
            ]
        ]);

        return redirect()->route('purchase.show', ['item_id' => $item_id]);
    }
}

