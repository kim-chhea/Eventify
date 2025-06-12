<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $events = [
            [
                'location_id' => 1,
                'category_id' => 1,
                'titles' => 'Khmer Music Festival',
                'description' => 'A live music festival featuring top Khmer artists.',
                'start_time' => Carbon::parse('2025-07-01 18:00:00'),
                'end_time' => Carbon::parse('2025-07-01 22:00:00'),
                'online_link' => null,
                'capacity' => 300
            ],
            [
                'location_id' => 2,
                'category_id' => 2,
                'titles' => 'Tech Startup Conference',
                'description' => 'Learn from Cambodian tech leaders and entrepreneurs.',
                'start_time' => Carbon::parse('2025-07-05 09:00:00'),
                'end_time' => Carbon::parse('2025-07-05 17:00:00'),
                'online_link' => 'https://zoom.com/techconf',
                'capacity' => 500
            ],
            [
                'location_id' => 3,
                'category_id' => 3,
                'titles' => 'Art in Cambodia Expo',
                'description' => 'A showcase of local painters, sculptors, and digital artists.',
                'start_time' => Carbon::parse('2025-07-10 10:00:00'),
                'end_time' => Carbon::parse('2025-07-10 16:00:00'),
                'online_link' => null,
                'capacity' => 150
            ],
            [
                'location_id' => 4,
                'category_id' => 4,
                'titles' => 'Cambodia Business Summit',
                'description' => 'Networking with investors and business founders.',
                'start_time' => Carbon::parse('2025-07-15 08:00:00'),
                'end_time' => Carbon::parse('2025-07-15 16:00:00'),
                'online_link' => 'https://eventlink.com/business',
                'capacity' => 600
            ],
            [
                'location_id' => 5,
                'category_id' => 5,
                'titles' => 'National Sports Day',
                'description' => 'All-day sports competition open to the public.',
                'start_time' => Carbon::parse('2025-07-20 07:00:00'),
                'end_time' => Carbon::parse('2025-07-20 17:00:00'),
                'online_link' => null,
                'capacity' => 1000
            ],
            [
                'location_id' => 6,
                'category_id' => 1,
                'titles' => 'Health & Wellness Workshop',
                'description' => 'Seminar on healthy eating, fitness, and mental health.',
                'start_time' => Carbon::parse('2025-07-25 10:00:00'),
                'end_time' => Carbon::parse('2025-07-25 14:00:00'),
                'online_link' => 'https://healthworkshop.com',
                'capacity' => 200
            ],
            [
                'location_id' => 7,
                'category_id' => 2,
                'titles' => 'Education Innovation Day',
                'description' => 'Talks and projects by students and teachers.',
                'start_time' => Carbon::parse('2025-08-01 09:00:00'),
                'end_time' => Carbon::parse('2025-08-01 15:00:00'),
                'online_link' => null,
                'capacity' => 400
            ],
            [
                'location_id' => 8,
                'category_id' => 3,
                'titles' => 'Travel Around Cambodia',
                'description' => 'Tourism expo featuring destinations and travel deals.',
                'start_time' => Carbon::parse('2025-08-05 11:00:00'),
                'end_time' => Carbon::parse('2025-08-05 17:00:00'),
                'online_link' => 'https://visitcambodia.com/live',
                'capacity' => 350
            ],
            [
                'location_id' => 9,
                'category_id' => 4,
                'titles' => 'Cambodia Photo Walk',
                'description' => 'Join professional photographers to capture city life.',
                'start_time' => Carbon::parse('2025-08-10 06:00:00'),
                'end_time' => Carbon::parse('2025-08-10 12:00:00'),
                'online_link' => null,
                'capacity' => 100
            ],
            [
                'location_id' => 10,
                'category_id' => 5,
                'titles' => 'Khmer Food Tasting Tour',
                'description' => 'Explore the tastes of traditional Cambodian cuisine.',
                'start_time' => Carbon::parse('2025-08-15 12:00:00'),
                'end_time' => Carbon::parse('2025-08-15 18:00:00'),
                'online_link' => null,
                'capacity' => 250
            ],
        ];
        foreach($events as $event)
        {
            Event::create($event);
        }
    }
}
