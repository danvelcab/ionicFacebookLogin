<?php

use Illuminate\Database\Seeder;
use Type\Type;

class TypeTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('types')->delete();

		// internet
		Type::create(array(
				'name' => 'internet'
			));

		// in shop
		Type::create(array(
				'name' => 'in shop'
			));
	}
}