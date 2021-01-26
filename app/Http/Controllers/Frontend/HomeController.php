<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Lottery;
/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
    	$lottery = Lottery::where('status', '=', 'on')->withCount('ticket')->paginate();
        return view('frontend.index',[ 
			'lotteries' => $lottery,
		]);
    }
}
