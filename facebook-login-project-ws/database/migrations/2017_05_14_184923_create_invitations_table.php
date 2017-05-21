<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvitationsTable extends Migration {

	public function up()
	{
		Schema::create('invitations', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('friend_list_id')->unsigned();
			$table->integer('to_user_id')->unsigned();
			$table->tinyInteger('accepted')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('invitations');
	}
}