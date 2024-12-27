<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use App\Notifications\CustomVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * 
     * @var array
     */
    protected $with = ['roles','complementary_data'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'description',
        'email',
        'password',
        'phone',
        'country',
        'state',
        'city',
        'active',
        'role',
        'address',
        'address_complement',
        'date_born',
        'current_team_id',
        'image_base64',
        'pos_register',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_born' => 'date',
        ];
    }
    /*💱💱💱💱
    *************************************
    ----------------MUTATORS-------------
    *************************************
     */
    /**
     * 
     * @param mixed $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value)); // Convierte la primera letra de cada palabra a mayúscula
    }
    /**
     * 
     * @param mixed $value
     * @return void
     */
    public function setLastnameAttribute($value)
    {
        $this->attributes['lastname'] = ucwords(strtolower($value)); // Convierte la primera letra de cada palabra a mayúscula
    }
    /**
     * Summary of hasRole
     * @param int $role
     * @return bool
     */
    public function hasRole(Int $role)
    {
        return $this->role === $role; 
    }
    /**
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roles(){
        return $this->belongsTo(Roles::class, 'role');
    }
    /**
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function complementary_data()
    {
        return $this->hasOne(Complementary_Data::class, 'user_id');
    }

    /**
     * Summary of sendEmailVerificationNotification
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail());
    }
}
