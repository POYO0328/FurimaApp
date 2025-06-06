<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePurchasesTableForTimestamps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchases', function (Blueprint $table) {
            // 1カラムずつ削除
            $table->dropColumn('shipping_postal_code');
        });

        Schema::table('purchases', function (Blueprint $table) {
            $table->dropColumn('shipping_address');
        });

        Schema::table('purchases', function (Blueprint $table) {
            $table->dropColumn('shipping_building');
        });
    
        Schema::table('purchases', function (Blueprint $table) {
            $table->dropColumn('purchased_at');
        });
    
        Schema::table('purchases', function (Blueprint $table) {
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchases', function (Blueprint $table) {
            // timestamps を削除
            $table->dropTimestamps();

            // 削除したカラムを戻す（必要に応じて）
            $table->string('shipping_postal_code', 10);
            $table->string('shipping_address', 255);
            $table->string('shipping_building', 255)->nullable();
            $table->timestamp('purchased_at')->nullable();
        });
    }
}
