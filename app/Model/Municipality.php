<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'province_code', 'psgc_code', 'name',
    ];
}
