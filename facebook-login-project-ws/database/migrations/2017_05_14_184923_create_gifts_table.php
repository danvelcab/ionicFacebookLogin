<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGiftsTable extends Migration {

	public function up()
	{
		Schema::create('gifts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('name');
			$table->text('description')->nullable();
			$table->text('url')->nullable();
			$table->text('img_url')->nullable();
			$table->integer('type_id')->unsigned();
			$table->integer('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('gifts');
	}
}