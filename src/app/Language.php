<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'language','color'
    ];

    public function data()
    {
        return $this->hasMany('App\Data');
    }
}
