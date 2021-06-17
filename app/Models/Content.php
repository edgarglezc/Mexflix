<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }

    protected $fillable = ['name', 'description', 'duration', 'year', 'is_serie', 'seasons', 'image_path', 'link_path'];
}