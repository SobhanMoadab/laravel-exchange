<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens,HasRoles;
    protected $guarded = [];
    // protected $guard_name = 'api';

    public function tickets()
    {
        return $this->hasMany(Tickets::class, 'user_id', 'id');
    }
}
