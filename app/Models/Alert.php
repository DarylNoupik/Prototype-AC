<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'message', 'critical_data', 'date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
