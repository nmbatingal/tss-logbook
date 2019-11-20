<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'region_code', 'psgc_code', 'name',
    ];
}
