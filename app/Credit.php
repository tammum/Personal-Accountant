<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    //
    protected $fillable = [
        'id', 'date', 'salary', 'bonus', 'loan'
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
