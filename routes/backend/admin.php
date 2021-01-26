<?php

use App\Http\Controllers\Backend\DashboardController;
use Tabuna\Breadcrumbs\Trail;
use App\Models\Lottery;
use App\Models\LotteriesArchive;
use App\Models\Tickets;
use App\Domains\Auth\Models\User;
use App\Notifications\winnerMsg;


// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });


// все лотереи
    
// создать лотерею
    

// проведение розыгрыша
Route::get('draw/{id}', function ($id) {

	// вытаскиваем лотерею по id
	$lottery = Lottery::where('id', '=', $id)->firstOrFail();

	// проверка на минимальное количество участников
	if ($lottery->users_count < 10) {
		return redirect('/admin/dashboard')->with('status', 'Недостаточно участников');
	}
	// проверка на то, была ли проведена лотерея
	if($lottery->status == 'ended') {
		return redirect('/admin/dashboard')->with('status', 'Розыгрыш уже проведен');
	}

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
    Tickets::where('lottery_id', $id)
    ->where('status', '!=', 'winner')
    // ->get();
    ->delete();
    // положить лотерею в архив лотерей
    LotteriesArchive::create([
    		'id' => $id,
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

    return view('backend.draw',[ 
    	'lottery' => $lottery,
    	'user' => $user,
	]);
})->name('admin.draw');


