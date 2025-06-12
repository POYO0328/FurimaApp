<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCategoryIdToStringInItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 外部キー制約を削除してカラムも削除
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });

        // 文字列型で再追加（カンマ区切り保存用）
        Schema::table('items', function (Blueprint $table) {
            $table->string('category_id')->nullable()->after('image_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        // 元に戻す処理（任意）
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('category_id');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
        });
    }
}
