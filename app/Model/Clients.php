<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\ClientQueue;

class Clients extends Model
{
    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'services', 
        'gia_checklist',
        'scholarship_checklist',
        'other_services', 
        'lastname', 
        'firstname', 
        'mi',
        'age_group',
        'gender',
        'email',
        'mobile_number',
        'year_level',
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
        return "{$this->lastname}, {$this->firstname}";
    }

    public function setLastnameAttribute($value)
    {
        $this->attributes['lastname'] = strtoupper($value);
    }

    public function setFirstnameAttribute($value)
    {
        $this->attributes['firstname'] = strtoupper($value);
    }

    public function setMiAttribute($value)
    {
        $this->attributes['mi'] = strtoupper($value);
    }

    public function setGiaChecklistAttribute($value)
    {
        $this->attributes['gia_checklist'] = json_encode($value);
    }

    public function setScholarshipChecklistAttribute($value)
    {
        $this->attributes['scholarship_checklist'] = json_encode($value);
    }
    
    /**
     * Client code
     * 
     * @return string
     */
    public function clientCode()
    {
        return $this->hasOne(ClientQueue::class, 'client_id', 'id')->latest();
    }
}
