<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class DailyExpense extends Model
{
    //
    protected $fillable = [
        'users_id', 'date', 'morning_bus_fair', 'morning_shopping', 'evening_bus_fair', 'evening_shopping', 'mobile_expense', 'other_expense'
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
