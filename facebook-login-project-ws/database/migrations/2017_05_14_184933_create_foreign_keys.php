<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('gifts', function(Blueprint $table) {
			$table->foreign('type_id')->references('id')->on('types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('gifts', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('invitations', function(Blueprint $table) {
			$table->foreign('friend_list_id')->references('id')->on('friend_lists')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('invitations', function(Blueprint $table) {
			$table->foreign('to_user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('friend_lists', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('gifts', function(Blueprint $table) {
			$table->dropForeign('gifts_type_id_foreign');
		});
		Schema::table('gifts', function(Blueprint $table) {
			$table->dropForeign('gifts_user_id_foreign');
		});
		Schema::table('invitations', function(Blueprint $table) {
			$table->dropForeign('invitations_friend_list_id_foreign');
		});
		Schema::table('invitations', function(Blueprint $table) {
			$table->dropForeign('invitations_to_user_id_foreign');
		});
		Schema::table('friend_lists', function(Blueprint $table) {
			$table->dropForeign('friend_lists_user_id_foreign');
		});
	}
}