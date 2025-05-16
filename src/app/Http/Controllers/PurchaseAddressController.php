<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseAddressController extends Controller
{
    // フォームの表示
    public function showForm($item_id)
    {
        return view('item.address', compact('item_id'));
    }

    // フォーム送信処理
    public function submitAddress(Request $request, $item_id)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'postal_code' => 'required|string|max:10',
        ]);

        // ここで住所をセッションに保存 or DB保存 or 次画面に渡す処理
        // 今回はセッションに仮保存とします
        session([
            'purchase_address' => [
                'item_id' => $item_id,
                'address' => $request->address,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
            ]
        ]);

        // 次の確認画面へ遷移（仮のルート）
        return redirect()->route('purchase.confirm', ['item_id' => $item_id]);
    }
}
