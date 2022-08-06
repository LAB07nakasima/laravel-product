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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->collate('utf8mb4_general_ci')->comment('名前');
            $table->string('email', 100)->unique()->comment('メールアドレス');
            $table->string('password')->unique()->comment('パスワード');
            $table->rememberToken()->nullable();
            $table->tinyInteger('age')->comment('年齢');
            //$table->boolean('gender')->unsigned()->comment('性別'); //unsigned -はなく＋だけの値だという意味
            $table->enum('gender',['男性','女性'])->comment('性別');
            //$table->tinyinteger('gender')->unsigned()->comment('性別 1:男、2:女');
            $table->string('address',100)->comment('住所');
            $table->integer('thanks_point')->nullable()->comment('ポイント');
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
        Schema::dropIfExists('users');
    }
};
