<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    protected $table = 'beer';

    protected $fillable = [
        'name',
        'country',
        'type',
        'image_url',
        'price',
        'price_per_litre',
        'quantity',
        'volume_of_unit'
    ];

    public function brewer()
    {
        return $this->belongsTo(Brewer::class);
    }

}
