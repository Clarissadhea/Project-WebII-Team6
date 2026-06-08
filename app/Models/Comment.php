<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'idol_id',
        'isi_komentar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function idol()
    {
        return $this->belongsTo(Idol::class);
    }
}