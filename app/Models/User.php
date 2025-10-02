<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'avatar',
        'name',
        'username',
        'email',
        'password',
        'role_id',
        'login_at',
        'change_password_at',
        'google_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->hasRole(config('constants.role.admin.name'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function registerUser()
    {
        return $this->hasMany(RegisterUser::class);
    }

    /**
     * @param $query
     * @param $search
     * @return mixed
     */
    public function scopeSearchByName($query, $search)
    {
        if ($search) {
            return $query->where('name', 'like', '%' . $search . '%');
        }
        return $query;
    }

    /**
     * @param $query
     * @param $search
     * @return mixed
     */
    public function scopeSearchByUsername($query, $search)
    {
        if ($search) {
            return $query->where('username', 'like', '%' . $search . '%');
        }
        return $query;
    }

    /**
     * @param $query
     * @param $roleId
     * @return mixed
     */
    public function scopeSearchByRoleId($query, $roleId): mixed
    {
        if ($roleId) {
            $query->whereHas('roles', function($q) use ($roleId) {
                $q->where('id', $roleId);
            });
        }

        return $query;
    }

    /**
     * @param $query
     * @param $email
     * @return mixed
     */
    public function scopeWhereByEmail($query, $email)
    {
        return $query->where('email', $email);
    }

    /**
     * @param $query
     * @param $googleId
     * @return mixed
     */
    public function scopeWhereByGoogleId($query, $googleId)
    {
        return $query->where('google_id', $googleId);
    }

    /**
     * @param $query
     * @param $userId
     * @return mixed
     */
    public function scopeWhereNotInId($query, $userId)
    {
        return $query->where('id', '!=', $userId);
    }
}
