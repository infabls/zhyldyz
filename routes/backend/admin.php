<?php

use App\Http\Controllers\Backend\DashboardController;
use Tabuna\Breadcrumbs\Trail;
use App\Models\Lottery;
use App\Models\Tickets;
use App\Domains\Auth\Models\User;


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



	// помечаем билет выигрышным
	$ticket = Tickets::findOrFail($id);
	$ticket->status = 'winner';
    $ticket->save();


    return view('backend.draw',[ 
    	'lottery' => $lottery,
    	'user' => $user,
	]);
})->name('admin.draw');