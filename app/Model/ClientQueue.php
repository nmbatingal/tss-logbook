<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\User;
use App\Model\Clients;

class ClientQueue extends Model
{
    protected $table = 'client_queues';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 
        'queue_code', 
        'is_queued', 
        'user_id', 
    ];

    public function client()
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Return inqueue clients. 
     * 
     * @return boolean
     */
    public function scopeInQueue($query) 
    {
        return $query->where('is_queued', false);
    }
}
