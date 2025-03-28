<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rfid extends Model
{
    use HasFactory;
    
    protected $table = 'rfids';
    protected $fillable = [
        'user_id',
        'rfid',
    ];

    public static function getRfid($userId)
    {
        return Rfid::where('user_id', $userId)->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
