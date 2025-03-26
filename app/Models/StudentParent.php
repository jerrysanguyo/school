<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model
{
    use HasFactory;

    protected $table = 'student_parents';
    protected $fillable = [
        'student_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'contact_number',
    ];

    public static function getParentPerStudent($studentId)
    {
        return self::where('student_id', $studentId)->first();
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
