<?php

namespace Database\Seeders;

use App\Models\Tickets;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Class TicketsTableSeeder.
 */
class TicketsSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, Tickets id of 1
        Tickets::create([
            'user_id' => 2,
            'lottery_id' => 1,
            'status' => 'paid',
            'code' => Str::random(10),
            'created_at' => now()
        ]);
        Tickets::create([
            'user_id' => 2,
            'lottery_id' => 1,
            'status' => 'winner',
            'code' => Str::random(10),
            'created_at' => now()
        ]);
        Tickets::create([
            'user_id' => 2,
            'lottery_id' => 2,
            'status' => 'paid',
            'code' => Str::random(10),
            'created_at' => now()
        ]);
        Tickets::create([
            'user_id' => 2,
            'lottery_id' => 2,
            'status' => 'not paid',
            'code' => Str::random(10),
            'created_at' => now()
        ]);


        $this->enableForeignKeys();
    }
}
