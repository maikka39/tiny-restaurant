<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function links() 
    {
        return $this->belongsToMany(Link::class);
    }

    public function settings() 
    {
        return $this->hasMany(HomepageSetting::class);
    }
}
