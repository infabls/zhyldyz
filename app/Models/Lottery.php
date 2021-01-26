<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
	protected $guarded = ['id'];
    use HasFactory;
    
        public function ticket()
	{
	    return $this->hasMany('App\Models\Tickets');
	}
}
