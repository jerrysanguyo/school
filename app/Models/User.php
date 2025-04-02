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

    protected $table = 'users';

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

    public function scopeSearchByName($query, $search)
    {
        if (strpos($search, ' ') !== false) {
            [$firstName, $lastName] = preg_split('/\s+/', $search, 2);
            return $query->where('first_name', 'like', "%{$firstName}%")
                        ->where('last_name', 'like', "%{$lastName}%");
        }

        return $query->where(function ($q) use ($search) {
            $q->where('first_name', 'like', "%{$search}%")
            ->orWhere('last_name', 'like', "%{$search}%");
        });
    }
        
    // created a nested array for dynamic relationships
    // key is the outer array
    // config is the inner array
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

        'userAttendance' => [
            'relation' => 'hasMany',
            'class' => Attendance::class,
        ],
    ];

    protected static $cmsRelationship = [
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
                // The reason why there are 2 user_id and student_id
                // user_id is applicable for teacher and student while the student is only applicable to student only.
                if ($userKey === 'userRfid' || $userKey === 'userAttendance')
                {
                    // if the foreignId is name as user_id
                    return $this->{$userValue['relation']}($userValue['class'], 'user_id');
                    // interpretation: equivalent to calling, $this->hasOne(Rfid::class, 'user_id');
                } else {
                    return $this->{$userValue['relation']}($userValue['class'], 'student_id');
                    // interpretation: equivalent to calling, $this->hasOne(Rfid::class, 'student_id');
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