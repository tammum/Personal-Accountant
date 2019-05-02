<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    //
    protected $primaryKey = 'credit_id';
    protected $fillable = [
        'id', 'date', 'salary', 'bonus', 'loan'
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
