<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\table;
class UserEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datas = [
            ['user_id' => 1, 'event_id' => 1, 'status' => 'attending'],
            ['user_id' => 1, 'event_id' => 2, 'status' => 'interested'],
            ['user_id' => 2, 'event_id' => 1, 'status' => 'not_attending'],
            ['user_id' => 2, 'event_id' => 3, 'status' => 'attending'],
            ['user_id' => 3, 'event_id' => 2, 'status' => 'interested'],
            ['user_id' => 3, 'event_id' => 3, 'status' => 'attending'],
            ['user_id' => 4, 'event_id' => 1, 'status' => 'interested'],
            ['user_id' => 4, 'event_id' => 4, 'status' => 'not_attending'],
            ['user_id' => 5, 'event_id' => 3, 'status' => 'attending'],
            ['user_id' => 5, 'event_id' => 5, 'status' => 'interested'],
        ];
        foreach($datas as $data)
        {
           DB::table('users_events')->insert($data);
        }

    }
}
