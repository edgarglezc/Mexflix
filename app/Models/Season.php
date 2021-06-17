<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
