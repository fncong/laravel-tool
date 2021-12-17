<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DictionarySeeder extends Seeder
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
                'label' => '首页轮播图',
                'value' => 'banner',
                'group' => 'advertisement',
            ]
        ];
        \App\Models\Dictionary::query()->insert($data);
    }
}


















