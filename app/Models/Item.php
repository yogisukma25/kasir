<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'stock',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function company()
{
    return $this->belongsTo(Company::class);
}

}