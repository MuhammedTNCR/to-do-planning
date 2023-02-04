<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'hourly_difficulty'
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
