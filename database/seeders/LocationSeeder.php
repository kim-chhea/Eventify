<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $locations = [
            ['name' => 'Olympic Stadium', 'address' => 'Street 163', 'city' => 'Phnom Penh', 'state' => 'Phnom Penh', 'postal_code' => '12000'],
            ['name' => 'Angkor Wat Temple', 'address' => 'Angkor Archaeological Park', 'city' => 'Siem Reap', 'state' => 'Siem Reap', 'postal_code' => '17000'],
            ['name' => 'Riverside Park', 'address' => 'Sisowath Quay', 'city' => 'Phnom Penh', 'state' => null, 'postal_code' => '12000'],
            ['name' => 'Battambang Railway Station', 'address' => 'National Road 5', 'city' => 'Battambang', 'state' => null, 'postal_code' => '02000'],
            ['name' => 'Kampot Pepper Farm', 'address' => 'Kampot Hills', 'city' => 'Kampot', 'state' => 'Kampot', 'postal_code' => '07000'],
            ['name' => 'Kep Beach', 'address' => 'Coastal Road', 'city' => 'Kep', 'state' => null, 'postal_code' => '07500'],
            ['name' => 'Sihanoukville Port', 'address' => 'Port Street', 'city' => 'Sihanoukville', 'state' => 'Preah Sihanouk', 'postal_code' => '18000'],
            ['name' => 'Mondulkiri Elephant Valley', 'address' => 'Sen Monorom', 'city' => 'Mondulkiri', 'state' => null, 'postal_code' => '11180'],
            ['name' => 'Rattanakiri Lake', 'address' => 'Boeng Yeak Laom', 'city' => 'Banlung', 'state' => 'Rattanakiri', 'postal_code' => '16000'],
            ['name' => 'Takeo Museum', 'address' => 'National Road 2', 'city' => 'Takeo', 'state' => null, 'postal_code' => '21000'],
        ];
        foreach($locations as $location)
        {
            Location::create($location);
        }
    }
}
