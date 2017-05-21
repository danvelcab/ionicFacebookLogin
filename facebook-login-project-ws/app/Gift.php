<?php

namespace Gift;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model 
{

    protected $table = 'gifts';
    public $timestamps = true;

    public function getType()
    {
        return $this->belongsTo('Type');
    }

}