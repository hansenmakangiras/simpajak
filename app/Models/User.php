<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasRoles;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'is_admin',
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
        'login_at' => 'datetime',
    ];

    /**
     * Scope a query to only include active users.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 1);
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeNotActive(Builder $query): Builder
    {
        return $query->where('status', '<>',1);
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeNotAdmin(Builder $query): Builder
    {
        return $query->where('is_admin', '<>',1);
    }

    /**
     * Scope a query to choose users by role.
     *
     * @param  Builder  $query
     * @param  int  $type
     * @return Builder
     */
    public function scopeisAdmin(Builder $query, int $type): Builder
    {
        return $query->where('is_admin', $type);
    }
}
