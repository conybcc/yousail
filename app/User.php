<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use File;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * avatar
     * 用户头像地址
     * @return
     */
    public function avatar()
    {
        $path = 'storage/' . $this->id . '.png';

        if (!File::exists(public_path($path))) {
            return '/storage/default_avatar.png';
        }

        return '/' . $path;
    }
}
