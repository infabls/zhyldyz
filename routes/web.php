<?php

use App\Http\Controllers\LocaleController;
use App\Models\Tickets;
use App\Models\Lottery;
use App\Models\User;
use Illuminate\Http\Request;



/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

// проведение розыгрыша
Route::get('results/{id}', function ($id) {
	$lottery = Lottery::where('id', '=', $id)->firstOrFail();
	if ($lottery->status !== 'ended') {
		return redirect('/lottery/'.$id);
	}
	return view('lottery',[ 
	'lottery' => $lottery,
	'ended' => true,
	]);
});

// вывод всех лоттерей
Route::get('lotteries', function () {
	$lottery = Lottery::where('status', '=', 'on')->withCount('ticket')->paginate();
	// $lotteries
	return view('lotteries',[ 
	'lotteries' => $lottery,
	]);
});

// вывод одной лотереи по id
Route::get('lottery/{id}', function ($id) {
	$lottery = Lottery::where('id', '=', $id)->withCount('ticket')->firstOrFail();
	// завершена ли лотерея
	if ($lottery->status == 'ended') {
		return redirect('/results/' . $id)->with('status', 'Лотерея уже закончена(( Примите участие в другой');
	}
	// $lottry
	return view('lottery',[ 
	'lottery' => $lottery,
	]);
});

// форма создания билета без регистрации
Route::get('lottery/{id}/create', function ($id) {
	$lottery = Lottery::where('id', '=', $id)->firstOrFail();

	// завершена ли лотерея
	if ($lottery->status == 'ended') {
		return redirect('/results/' . $id)->with('status', 'Лотерея уже закончена(( Примите участие в другой');
	}
		return view('ticket_create',[ 
		'lottery' => $lottery,
	]);
});

// Прием заявки на создание тикета
Route::post('lottery/{id}/create', function (Request $request, $id) {
	$ticket = new tickets;
	if (Auth::id()) {
		$ticket->user_id = Auth::id();
	} else {
		$ticket->user_id = 1;
	}
	$ticket->lottery_id = $id;
    $ticket->code = $request->code;
    $ticket->status = 'not paid';
    $ticket->created_at = now();
    $ticket->save();
    return back()->with('status', 'Ваш билет создан. Хотите еще?');
});

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__.'/backend/');
});

