<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'content','color'
    ];

    public function data()
    {
        return $this->hasMany('App\Data');
    }
}
