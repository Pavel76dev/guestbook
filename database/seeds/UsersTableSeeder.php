<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
		
		$data [] = [
			'email'=>'ueser@testmailg.ru',
			'password'=>bcrypt('qwerty1234'),
		];
		
		for($i = 2; $i<=5; $i++){
			$data [] = [
				'email'=>'ueser'.$i.'@testmailg.ru',
				'password'=>bcrypt(str_random(16)),
			];
		}
		
		DB::table('users')->insert($data);
    }
}
