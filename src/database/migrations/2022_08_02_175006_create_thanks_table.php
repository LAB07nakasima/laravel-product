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
        Schema::create('thanks', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->unsignedBigInteger('user_id')->constrained();
            $table->unsignedBigInteger('post_id');
            $table->integer('ty_value')->comment('ポイント数');
            $table->timestamps();

            // // 外部キーの設定
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('post_id')->references('id')->on('posts')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            // $table->id();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thanks');
    }
};
