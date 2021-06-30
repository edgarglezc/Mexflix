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

    public function isSerie()
    {
        if($this->is_serie) return "on";        
    }

    protected $fillable = ['name', 'description', 'is_serie', 'duration', 'year', 'image_path', 'link_path'];
}
