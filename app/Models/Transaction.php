<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_id',
        'quantity',
        'total_amount',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function company()
{
    return $this->belongsTo(Company::class);
}

}