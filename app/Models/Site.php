<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'pays','region','ville','Temp_moy'];

    public function cultures()
    {
        return $this->hasMany(Culture::class);
    }
}
