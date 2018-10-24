<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    protected $table = 'visit';

    protected $fillable = [
        'name',
    ];

    public function beer()
    {
        return $this->belongsTo(User::class);
    }

}
