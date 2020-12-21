<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
use Tabuna\Breadcrumbs\Trail;
use App\Models\Tickets;
use App\Domains\Auth\Models\User;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    });

// вывод своих билетов
Route::get('tickets', function () {
    if (!Auth::user()) {
        return abort(404);
    }

	$tickets = User::find(Auth::id())->tickets()->paginate(5);

	foreach ($tickets as $ticket) {
		$ticket->lottery = $ticket->lottery()->first()->toArray();
	}

    return view('frontend.pages.tickets',[ 'tickets' => $tickets]);
})->name('home.tickets');

// удаление билета
Route::delete('/tickets/{id}', function ($id) {

	$user_id = Auth::id();
	$ticket = Tickets::findOrFail($id);
	// проверить что это наш билет
    if ($ticket->user_id == $user_id) {

    	// что этот билет неоплачен
    	if ($ticket->status == 'paid') {
    		return back()->with('status', 'Вы не можете удалить оплаченный билет');
    	}
        $ticket->delete();
        return back()->with('status', 'Билет был удален');
    }
    else {
        return abort(401);
    }
});    


// оплата билета
Route::put('/tickets/{id}', function ($id) {

    $user_id = Auth::id();
	$ticket = Tickets::findOrFail($id);

	// оплачиваем только если билет наш, и он уже не был оплочен
    if ($ticket->user_id == $user_id) {
    	if ($ticket->status !== 'not paid') {
  			return back()->with('status', 'Билет уже был оплачен');
    	}
        $ticket->status = 'paid';
        $ticket->save();
        return back()->with('status', 'Билет был оплачен');

    }
    else {
        return abort(401);
    }
    
});
