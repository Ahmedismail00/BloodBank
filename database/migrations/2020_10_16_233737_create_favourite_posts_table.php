<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFavouritePostsTable extends Migration {

	public function up()
	{
		Schema::create('favourite_posts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
			$table->string('image');
			$table->string('content');
			$table->integer('category_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('favourite_posts');
	}
}