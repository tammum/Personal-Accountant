<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyExpense extends Model
{
    //
    protected $fillable = [
        'id', 'date', 'house_rent', 'electricity_bill', 'balance_transfer', 'repay_loan', 'mobile_expense', 'other_expense'
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
