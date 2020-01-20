<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Barangay;
use App\Model\Province;

class Municipality extends Model
{
    protected $connection   = 'mysql';
    protected $table        = 'municipalities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'province_code', 'psgc_code', 'name',
    ];

    /**
     * Get the province.
     */
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_code', 'code');
    }

    /**
     * Get the barangays.
     */
    public function barangays()
    {
        return $this->hasMany(Barangay::class, 'municipality_code', 'code');
    }
}
