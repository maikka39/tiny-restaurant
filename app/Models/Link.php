<?php

namespace App\Models;

use App\Models\Home;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url'];

    public function homes() 
    {
        return $this->belongsToMany(Home::class);
    }
}