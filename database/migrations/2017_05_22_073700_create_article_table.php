<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->unsignedInteger('user_id')->comment('作者');
            $table->string('title')->comment('标题');
            $table->text('content')->comment('内容');
            $table->unsignedInteger('category_id')->comment('分类');
            $table->timestamps();

            $table->index('user_id');
            $table->index('category_id');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
