<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'services', 
        'other_services', 
        'lastname', 
        'firstname', 
        'mi',
        'age_group',
        'gender',
        'email',
        'mobile_number',
        'organization',
        'organization_type',
        'other_org_type',
        'province_code',
        'municipality_code',
        'barangay_code',
    ];

    /**
     * Get the client's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->lastname} {$this->firstname}";
    }
}
