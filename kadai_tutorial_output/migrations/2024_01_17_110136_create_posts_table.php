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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            //laravelのメソッド string('カラム名') = mysqlのデータ型 VARCHAR(255)
            $table->string('title');
            $table->text('content');
            //laravelのメソッド timestamps()は create_at update_atのカラムが作成される
            $table->timestamps();
        });
    }

    /**phpphph
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};