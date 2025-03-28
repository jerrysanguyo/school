<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'contact_number',
        'password',
        'role',
        'type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function getAllStudent()
    {
        return self::all();
    }
    
    protected static $userRelationships = [
        'studentParent' => [
            'relation' => 'hasOne',
            'class' => StudentParent::class,
        ],

        'studentDetail' => [
            'relation' => 'hasOne',
            'class' => StudentDetail::class,
        ],

        'studentQr' => [
            'relation' => 'hasOne',
            'class' => Qr::class,
        ],

        'userRfid' => [
            'relation' => 'hasOne',
            'class' => Rfid::class,
        ],
    ];

    protected static $cmsRelationship = [
        // created a nested array for dynamic relationships
        // key is the outer array
        // config is the inner array
        'district' => 
        [
            'relation' => 'hasMany',
            'class' => District::class,
        ],

        'barangay' => 
        [
            'relation' => 'hasMany',
            'class' => Barangay::class,
        ],

        'school' => 
        [
            'relation'  => 'hasOne',
            'class' => School::class,
        ],
    ];

    public function __call($method, $parameters)
    {

        foreach(self::$userRelationships as $userKey => $userValue)
        {
            if($method === $userKey)
            {
                if ($userKey === 'userRfid')
                {
                    return $this->{$userValue['relation']}($userValue['class'], 'user_id');
                    // interpretation: equivalent to calling, $this->hasOne(Rfid::class, 'user_id');
                } else {
                    return $this->{$userValue['relation']}($userValue['class'], 'student_id');
                }
            }
        }

        foreach (self::$cmsRelationship as $cmsKey => $cmsValue)
        {
            if ($method === $cmsKey . 'CreatedBy')
            {
                return $this->{$cmsValue['relation']}($cmsValue['class'], 'created_by');
                // interpretation: equivalent to calling, e.g., $this->hasMany(District::class, 'created_by')
            }
            if ($method === $cmsKey . 'UpdatedBy')
            {
                return $this->{$cmsValue['relation']}($cmsValue['class'], 'updated_by');
                // interpretation: equivalent to calling, e.g., $this->hasMany(District::class, 'updated_by')
            }
        }

        return parent::__call($method, $parameters);
    }
}