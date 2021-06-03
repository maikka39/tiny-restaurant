<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasPosition;
use Illuminate\Database\Eloquent\Model;

class DonationPageAmount extends Model
{
    use HasPosition;

    public $table = "donation_page_amounts";

    protected $fillable = [
        'published',
        'amount',
        'position',
        'donation_page_id',
    ];
}
