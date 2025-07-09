<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'slug',
        'file'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo{
        return $this->belongsTo(User::class);
    }
}
