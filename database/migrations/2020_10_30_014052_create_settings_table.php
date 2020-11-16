<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('notifications_settings_text');
			$table->text('about_app');
            $table->string('intro');
            $table->string('footer');
            $table->string('slider_title');
            $table->string('slider_text');
			$table->string('phone');
			$table->string('email');
            $table->string('tw_link');
            $table->string('insta_link');
            $table->string('facebook_link');
            $table->string('youtube_link');
            $table->string('whatsapp_link');
            $table->string('google_plus_link');
            $table->string('google_play_link');
            $table->string('app_store_link');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}
