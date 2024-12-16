<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Facker\Factory as Faker;


class nvhNhaCCTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1,100) as $index)
        {
            DB::table('nvhnhacc')->insert([
                'nvhMaNCC'=>$faker->uuid(),
                // 'MaNCC'=>$faker->word(15),
                'nvhTenNCC'=>$faker->sentence(5),
                'nvhDiachi'=>$faker->address(),
                'nvhSDT'=>$faker->phoneNumber(10),
                'nvhEmail'=>$faker->email(),
                'nvhstatus'=>$faker->boolean()
            ]);
        }
    }
}
