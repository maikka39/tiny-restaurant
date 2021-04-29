<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    use HasFactory;

    protected $fillable = ['home_id', 'key', 'value'];

    public function homes() {
        return $this->belongsTo(Home::class);
    }
}
