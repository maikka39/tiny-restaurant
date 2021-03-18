<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'body',
        'picture'
    ];

    public function farmers (): HasMany
    {
        return $this->hasMany(Farmer::class);
    }
}
