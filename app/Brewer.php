<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brewer extends Model
{
    protected $table = 'brewer';

    protected $fillable = [
        'name',
    ];

    public function beer()
    {
        return $this->hasMany(Beer::class);
    }

}
