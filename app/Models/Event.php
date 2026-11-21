<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function organizer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    protected $fillable = [
        'category_id',
        'organizer_id',
        'title',
        'slug',
        'description',
        'location',
        'start_at',
        'end_at',
        'registration_start_at',
        'registration_end_at',
        'capacity',
        'status',
    ];
}
