<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $faker = Faker\Factory::create();
        foreach (range(1, 20) as $index) {
            Db::table('transportatoris')->insert([
                'nume'             => $faker->company,
                'persoana_contact' => $faker->name,
                'numar_telefon'    => $faker->phoneNumber,
                'email'            => $faker->email,
            ]);
        }
    }
}
