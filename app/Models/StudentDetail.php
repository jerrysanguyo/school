<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    use HasFactory;

    protected $table = 'student_details';

    protected $fillable = [
        'student_id',
        'house_no',
        'street',
        'barangay_id',
        'district_id',
        'city',
    ];

    public static function getStudentDetail($studentId)
    {
        return self::where('student_id', $studentId)->first();
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
