<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class KonsumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("id_ID");
        $data  = [];
        for ($a = 0; $a < 30; $a++) {
            $data[] = [
                'nama'         => $faker->name,
                'no_handphone' => $faker->phoneNumber,
                'kode'         => str_random(5),
                'alamat'       => $faker->address,
            ];
        }

        \DB::table('konsumen')->insert($data);
    }
}
