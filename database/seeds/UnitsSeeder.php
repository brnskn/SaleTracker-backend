<?php

use App\Unit;
use Illuminate\Database\Seeder;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::firstOrCreate([
            "name" => "LT",
        ]);
        Unit::firstOrCreate([
            "name" => "ML",
        ]);
        Unit::firstOrCreate([
            "name" => "KG",
        ]);
        Unit::firstOrCreate([
            "name" => "G",
        ]);
    }
}
