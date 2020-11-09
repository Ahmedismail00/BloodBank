<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientNotificationsTable extends Migration {

	public function up()
	{
		Schema::create('client_notifications', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('is_read');
		});
	}

	public function down()
	{
		Schema::drop('client_notifications');
	}
}