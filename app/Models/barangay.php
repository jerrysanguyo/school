<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangay extends Model
{
    use HasFactory;

    protected $table = 'barangays';
    protected $fillable = [
        'district_id',
        'name',
        'remarks',
        'created_by',
        'updated_by'
    ];

    public static function getAllBarangays()
    {
        return self::all();
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
