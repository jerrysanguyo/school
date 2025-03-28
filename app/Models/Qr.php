<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qr extends Model
{
    use HasFactory;

    protected $table = 'qrs';

    protected $fillable = [
        'student_id',
        'qr',
        'path',
    ];

    public static function getQr($studentId)
    {
        return self::where('student_id', $studentId)->first();
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }
}
