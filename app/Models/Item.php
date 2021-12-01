<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'unit_price',
        'vat_inclusive',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}