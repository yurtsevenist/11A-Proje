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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->integer('pid')->comment("ürünün id numarasını tutar");
            $table->string('photo');
            $table->integer('order')->default(1)->comment("bir ürüne ait yüklenen resimlerin sıralarını belirler");
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->foreign('pid')
            ->references('id')
            ->on('products')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
};
