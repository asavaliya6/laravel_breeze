<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class LocationSeeder extends Seeder
{
    public function run()
    {

        $country = Country::create(['name' => 'India']);

        $gujarat = State::create(['name' => 'Gujarat', 'country_id' => $country->id]);
        City::create(['name' => 'Ahmedabad', 'state_id' => $gujarat->id]);
        City::create(['name' => 'Rajkot', 'state_id' => $gujarat->id]);
        City::create(['name' => 'Surat', 'state_id' => $gujarat->id]);
        City::create(['name' => 'Junagadh', 'state_id' => $gujarat->id]);

        $maharashtra = State::create(['name' => 'Maharashtra', 'country_id' => $country->id]);
        City::create(['name' => 'Mumbai', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Pune', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Nagpur', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Thane', 'state_id' => $maharashtra->id]);

        
        $country2 = Country::create(['name' => 'USA']);

        $california = State::create(['name' => 'California', 'country_id' => $country2->id]);
        City::create(['name' => 'Los Angeles', 'state_id' => $california->id]);
    }
}
