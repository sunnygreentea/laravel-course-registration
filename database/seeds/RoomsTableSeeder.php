<?php

use Illuminate\Database\Seeder;
use App\Room;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
            [
                'id'    => 1,
                'name' => 'R101',
            ],
            [
                'id'    => 2,
                'name' => 'R102',
            ],
            [
                'id'    => 3,
                'name' => 'R103',
            ],
            [
                'id'    => 4,
                'name' => 'R104',
            ],
            [
                'id'    => 5,
                'name' => 'R105',
            ],
            [
                'id'    => 6,
                'name' => 'R106',
            ],
        ];

        Room::insert($rooms);
    }
}
