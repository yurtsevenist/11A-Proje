<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer("cid")->comment("müşterinin id sini gösterir customer id");
            $table->integer("pid")->comment("ürünün id sini gösterir product id");
            $table->integer("number")->comment("sipariş adedini gösterir");
            $table->double("cargo")->default(0)->comment("Kargo bedelini gösterir");
            $table->double("total")->comment("toplam fiyatı gösterir");
            $table->date("date");
            $table->integer("status")->default(1)->comment("0 iptal, 1 sipariş, 2 onaylandı, 3 kargo, 4 teslim");
            $table->timestamps();
            $table->foreign('cid')
            ->references('id')
            ->on('users');
            $table->foreign('pid')
            ->references('id')
            ->on('products');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
