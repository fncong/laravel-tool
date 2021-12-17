<?php

namespace Database\Seeders;

use App\Enums\AdvertisementEnum;
use App\Models\Advertisement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'group' => 'banner',
                'title' => 'banner-1',
                'description' => '',
                'weight' => 0,
                'action_type' => AdvertisementEnum::ACTION_TAB,
                'value' => ''
            ]
        ];

        Advertisement::factory()->createMany($data);
    }
}
