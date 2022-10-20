<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = "user_roles";

    protected $fillable = [
        'role_id', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(SPPM::class, 'role_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(SPPM::class, 'user_id', 'id');
    }

    protected $primaryKey = "id";
}
