<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'language_id',
        'content_id',
        'hour'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function language()
    {
        return $this->belongsTo('App\Language');
    }
    public function content()
    {
        return $this->belongsTo('App\Content');
    }
}
