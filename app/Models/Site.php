<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['location', 'description'];

    public function cultures()
    {
        return $this->hasMany(Culture::class);
    }
}
