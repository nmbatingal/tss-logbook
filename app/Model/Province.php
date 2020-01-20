<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Municipality;

class Province extends Model
{
    protected $connection   = 'mysql';
    protected $table        = 'provinces';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'region_code', 'psgc_code', 'name',
    ];

    /**
     * Get the barangays.
     */
    public function municipalities()
    {
        return $this->hasMany(Municipality::class, 'province_code', 'code');
    }
}
