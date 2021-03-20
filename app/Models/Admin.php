<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    protected $table = 'admins';
    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'phone_number', 'role_id',
    ];

    protected $hidden = [
        'password', 'remember_token', 'state', 'is_deleted',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
}
