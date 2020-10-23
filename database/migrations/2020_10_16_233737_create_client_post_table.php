<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientPostTable extends Migration {

	public function up()
	{
		Schema::create('client_post', function(Blueprint $table) {
			$table->integer('client_id')->unsigned();
			$table->integer('favourite_post_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('client_post');
	}
}