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

