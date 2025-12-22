<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role): bool
    {
        $roleId = Role::select('id')->where('name', $role)->first();

        if ($roleId) {
            return in_array($roleId->id, $this->roles->pluck('id')->toArray());
        }

        return false;
    }

    public function hasRoles($roles = []): bool
    {
        foreach ($roles as $role) {
            $roleId = Role::select('id')->where('name', $role)->first();

            if ($roleId) {
                if (in_array($roleId->id, $this->roles->pluck('id')->toArray())) {
                    return true;
                }
            }
        }

        return false;
    }

    public function getRole(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
