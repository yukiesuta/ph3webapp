<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = [
        'content'
    ];

    public function data()
    {
        return $this->hasMany('App\Data');
    }
}
