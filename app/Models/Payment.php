<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'reference_number',
        'status',
        'amount',
        'fee',
        'currency',
        'refunded',
        'refunded_at',
        'captured',
        'captured_at',
        'voided_at',
        'description',
        'amount_format',
        'fee_format',
        'refunded_format',
        'captured_format',
        'invoice_id',
        'ip',
        'callback_url',
        'source',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
