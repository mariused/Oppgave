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
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
			$table->text('description');
			$table->text('url');
			$table->date('date');
			$table->boolean('emphasise');
			$table->string('category')->index()->nullable();
			$table->foreign('category')
			->references('category')->on('categories')
			->onDelete('set null')
			->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articleTable');
    }
}
