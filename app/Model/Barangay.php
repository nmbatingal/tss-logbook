<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Municipality;

class Barangay extends Model
{
    protected $connection   = 'mysql';
    protected $table        = 'barangays';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'municipality_code', 'name',
    ];

    /**
     * @return string
     */
    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    /**
     * Get the municipality.
     */
    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_code', 'code');
    }
}
