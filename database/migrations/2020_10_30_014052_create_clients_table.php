<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('phone');
			$table->string('email');
			$table->integer('blood_type_id')->unsigned();
			$table->string('name');
			$table->string('d_o_b');
			$table->string('last_donation_date');
			$table->integer('city_id')->unsigned();
			$table->integer('activation')->nullable();
			$table->integer('pin_code');
			$table->string('api_token', 60)->nullable();
			$table->string('password', 60);
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
