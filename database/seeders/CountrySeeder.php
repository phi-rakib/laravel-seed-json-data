<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::truncate();

        $json = File::get('database/data/country.json');
        $countries = json_decode($json);

        foreach ($countries as $code => $name) {
            Country::create([
                'name' => $name,
                'code' => $code,
            ]);
        }
    }
}
