<?php


class ItemsTableSeeder extends Seeder {
	public function run() {
		DB::table('items')->delete();

		$items = array(
			array(
				'onwer_id' => 1,
				'name' => 'Pick Up Milk',
				'done' => false
				),
			array(
				'onwer_id' => 1,
				'name' => 'Walk The Dogs',
				'done' => false
				),
			array(
				'onwer_id' => 1,
				'name' => 'Cook Dinner',
				'done' => false
				)
			);

		DB::table('items')->insert($items);
	}
}