<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ScoresTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            Score::create([
                "user_id" => $faker->randomNumber("1", "5"),
                "level" => "easy",
                "score" => $faker->randomNumber("100", "20000")
            ]);

            Score::create([
                "user_id" => $faker->randomNumber("1", "5"),
                "level" => "normal",
                "score" => $faker->randomNumber("100", "20000")
            ]);

            Score::create([
                "user_id" => $faker->randomNumber("1", "5"),
                "level" => "hard",
                "score" => $faker->randomNumber("100", "20000")
            ]);

            Score::create([
                "user_id" => $faker->randomNumber("1", "5"),
                "level" => "nolife",
                "score" => $faker->randomNumber("100", "20000")
            ]);
        }

	}

}
