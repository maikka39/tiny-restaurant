<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageSetting extends Model
{
    use HasFactory;

    protected $fillable = ['homepage_id', 'key', 'value'];

    public function homepage() {
        return $this->belongsTo(Homepage::class);
    }
}
