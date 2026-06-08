<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idol extends Model
{
    protected $fillable = [
        'nama_idol',
        'grup',
        'foto',
        'deskripsi'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}