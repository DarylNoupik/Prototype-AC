<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'user_id', 'site_id'];

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec le site
    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    // Relation Many-to-Many avec Culture (si applicable)
    public function cultures()
    {
        return $this->belongsToMany(Culture::class, 'culture_project')
        ->withPivot('id');
    }
    
}
