<?php


class UserTableSeeder extends Seeder {
	public function run() {
		DB::table('users')->delete();

		$user = array(
			array(
				'name' => 'Kahfi',
				'password' => Hash::make('Kahfi'),
				'email' => 'kahfimuhammad01@gmail.com'
				)
			);

		DB::table('users')->insert($user);
	}
}