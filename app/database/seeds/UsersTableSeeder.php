<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        User::create(array(
            "username" => "denbatte",
            "password" => Hash::make("letmein"),
        ));

        /** @noinspection PhpUnusedLocalVariableInspection */
        foreach(range(1, 5) as $index)
		{
			User::create(array(
                "username" => $faker->name,
                "password" => Hash::make($faker->word),
			));
		}
	}

}
