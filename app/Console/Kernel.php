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
            $lotteries = Lottery::all();
            foreach ($lotteries as $lottery) {
                // считаем количество активных билетов
                $tickets_count = Tickets::where('lottery_id', '=', $lottery->id)
                ->where('status', '=', 'paid')
                ->count();
                // проверка на минимальное количество участников
                if ($tickets_count > $lottery->users_count AND $lottery->status !== 'ended') {
                    // меняем статус лотереи на завершенную
                    $lottery->status = 'ended';
                    $lottery->save();

                    // поиск победителя
                    $lottery->winner = Tickets::select('*')
                        ->where('lottery_id', '=', $id)
                        ->where('status', '=', 'paid')
                        ->inRandomOrder()
                        ->first(1)
                        ->toArray();

                    // данные о пользователе победившем
                    $user = User::find($lottery->winner['user_id']);

                    // уведомить админа в телеграм
                    $user->notify(new winnerMsg($lottery->winner['user_id']));

                    // помечаем билет выигрышным
                    $ticket = Tickets::findOrFail($lottery->winner['id']);
                    $ticket->status = 'winner';
                    $ticket->save();

                    // удалить все невыигрышные билеты
                    Tickets::where('lottery_id', $lottery->id)
                    ->where('status', '!=', 'winner')
                    // ->get();
                    ->delete();
                    // положить лотерею в архив лотерей
                    LotteriesArchive::create([
                            'id' => $lottery->id,
                            'name' => $lottery->name,
                            'urlKey' => $lottery->urlKey,
                            'starts_at' => $lottery->starts_at,
                            'ends_at' => now(),
                            'price' => $lottery->price,
                            'description' => $lottery->description,
                            'winner_user_id' => $lottery->winner['user_id'],
                            'winner_ticket_id' => $lottery->winner['id'],
                        ]);
                    // создать новую лотерею на место старой
                    Lottery::create([
                            'name' => $lottery->name,
                            'urlKey' => $lottery->urlKey,
                            'starts_at' => now(),
                            'ends_at' => now()->subDays(30),
                            'price' => $lottery->price,
                            'status' => 'on',
                            'description' => $lottery->description,
                            'users_count' => $lottery->users_count,
                        ]);

                    // удаляем лотерею, если все сработало
                    $lottery->delete();

                    // вывод в консоль
                    echo "Лотерея '$lottery->name' проведена. Победил юзер с id $lottery->winner['user_id'] и билетом $lottery->winner['id'] \n";
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
