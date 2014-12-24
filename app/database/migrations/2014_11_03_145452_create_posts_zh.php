<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsZh extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts_zh', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('levels_id')->unsigned();
			$table->foreign('levels_id')->references('id')->on('levels');
			$table->string('title');
			$table->string('author');
			$table->string('content');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts_zh');
	}

}
