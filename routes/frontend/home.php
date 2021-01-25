<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
use Tabuna\Breadcrumbs\Trail;
use App\Models\Tickets;
use App\Models\Lottery;
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


// форма создания билета 
Route::get('lottery/{id}/create', function ($id) {
    if (!Auth::user()) {
        return redirect('login')->with('status', 'Для участия в лотерее нужно зарегистрироваться');
    }
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
        // что этот билет выиграл
        if ($ticket->status == 'winner') {
            return back()->with('status', 'Вы не можете удалить выигрышный билет');
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
