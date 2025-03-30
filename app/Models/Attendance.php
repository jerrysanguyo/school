<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attedances';
    protected $fillable = [
        'user_id',
        'time-in',
        'time-out',
    ];

    public static function getAttendance($userId)
    {
        return self::where('user_id', $userId)->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
