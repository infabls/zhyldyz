<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use App\Models\Lottery;
use App\Models\Tickets;
use App\Domains\Auth\Models\User;
use App\Notifications\winnerMsg;

/**
 * Class Kernel.
 */
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('activitylog:clean')->daily();

        $schedule->call(function () {
            for ($i=1   ; $i < 4; $i++) { 
                $lottery = Lottery::where('id', '=', $i)->withCount('ticket')->firstOrFail();
                // проверка на минимальное количество участников
                if ($lottery->ticket_count > $lottery->users_count AND $lottery->status !== 'ended') {
                    // меняем статус лотереи на завершенную
                    $lottery->status = 'ended';
                    $lottery->save();
                    // поиск победителя
                    $lottery->winner = Tickets::select('*')
                        ->where('lottery_id', '=', $i)
                        ->where('status', '=', 'paid')
                        ->inRandomOrder()
                        ->first(1)
                        ->toArray();
                    // данные о пользователе победившем
                    $user = User::find($lottery->winner['user_id']);

                    // уведомить пользователя всеми методами

                    // уведомить админа о победе
                    $user->notify(new winnerMsg($lottery));

                    // помечаем билет выигрышным
                    $ticket = Tickets::findOrFail($lottery->winner['id']);
                    $ticket->status = 'winner';
                    $ticket->save();
                } else {
                    echo "Лотерея '$lottery->name' не соответствует условиям розыгрыша \n";
                }
            }
        })->name("someName")->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
