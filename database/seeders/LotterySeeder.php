<?php

namespace Database\Seeders;

use App\Models\Lottery;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class LotteryTableSeeder.
 */
class LotterySeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, Lottery id of 1
        Lottery::create([
            'name' => 'Первая лотерея',
            'urlKey' => 'first',
            'starts_at' => now(),
            'ends_at' => now()->subDays(30),
            'price' => 1000,
            'status' => 'on',
            'description' => 'Описание тестовой лоттереи',
            'users_count' => 0,
        ]);
        Lottery::create([
            'name' => 'Вторая лотерея',
            'urlKey' => 'second',
            'starts_at' => now(),
            'ends_at' => now()->subDays(30),
            'price' => 5000,
            'status' => 'on',
            'description' => 'Описание тестовой лоттереи',
            'users_count' => 0,
        ]);

        $this->enableForeignKeys();
    }
}
