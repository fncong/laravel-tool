<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
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
                'group' => 'agent',
                'name' => '经销商产品',
                'key' => 'agent_product_id',
                'value' => '1',
                'type' => 'integer',
                'description' => '用户购买指定产品即可成为经销商',
            ]
        ];
        \App\Models\Config::query()->insert($data);
    }
}
