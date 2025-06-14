<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PaymentMethodTest extends TestCase
{
    use RefreshDatabase;

    public function test_payment_methodが正しく保存される()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $item = Item::factory()->create();

        $response = $this->post(route('purchase.complete', ['item_id' => $item->id]), [
            'payment_method' => 'コンビニ支払い',
            // 他に必要なフォームデータをここに書く
        ]);

        $response->assertRedirect('/mypage?page=buy');

        $this->assertDatabaseHas('purchases', [
            'user_id' => $user->id,
            'item_id' => $item->id,
            'payment_method' => 'コンビニ支払い',
        ]);
    }
}
