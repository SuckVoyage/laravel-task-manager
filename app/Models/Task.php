<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable('title', 'description', 'due', 'status')]
class Task extends Model
{
    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'due' => 'datetime',
            'status' => Status::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
