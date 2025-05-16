<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'price',
        'brand',
        'condition',
        'description',
        'image_path',
    ];

    // 必要に応じてテーブル名を指定（items なら不要）
    // protected $table = 'items';
}
