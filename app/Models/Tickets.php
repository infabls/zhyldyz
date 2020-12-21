<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    public function user()
	{
	    return $this->belongsTo('App\Domains\Auth\Models\User');
	}
	    public function lottery()
	{
	    return$this->belongsTo('App\Models\Lottery', 'lottery_id');
	}
}
