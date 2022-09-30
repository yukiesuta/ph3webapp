<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = [
        'language'
    ];

    public function data()
    {
        return $this->hasMany('App\Data');
    }
}
