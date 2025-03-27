<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';
    
    protected $fillable = [
        'name',
        'remarks',
        'created_by',
        'updated_by'
    ];

    public static function getAllDistrict()
    {
        return self::all();
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBY()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
