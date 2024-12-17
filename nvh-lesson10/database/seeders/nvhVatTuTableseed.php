<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nvhVatTuTableseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        DB::table('nvhavattu')->insert([
            'nvhMaVTu'=>'DD01',
            'nvhTenVTu'=>'Đầu DVD Hitachi 1 cửa',
            'nvhDVTinh'=>'Bộ',
            'PnvhhanTram'=>40,
        ]);
        DB::table('nvhavattu')->insert([
            'nvhMaVTu'=>'DD02',
            'nvhTenVTu'=>'Đầu DVD Hitachi 2 cửa',
            'nvhDVTinh'=>'Bộ',
            'PnvhhanTram'=>50,
        ]);
        */
        $faker = Faker::create();
        foreach(range(1,100) as $index)
        {
            DB::table('nvhvattu')->insert([
                'nvhMaVTu'=>$faker->word(4),
                'nvhTenVTu'=>$faker->sentence(5),
                'nvhDVTinh'=>$faker->word(3),
                'nvhPhanTram'=>$faker->randomFloat('2',0,100)
               
            ]);
        }
    }
}
