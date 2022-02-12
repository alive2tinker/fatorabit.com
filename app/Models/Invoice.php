<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use JamesMills\Uuid\HasUuidTrait;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Invoice extends Model
{
    use HasFactory, SoftDeletes, HasUuidTrait, LogsActivity;

    protected $fillable = [
        'subtotal',
        'vatTotal',
        'total',
        'user_id',
        'title',
        'to',
        'address',
        'toContact',
        'notes',
        'reference',
        'customer_vat',
        'customer_id'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly([
            'subtotal',
            'vatTotal',
            'total',
            'user_id',
            'title',
            'to',
            'address',
            'toContact',
            'notes',
            'reference',
            'customer_vat',
            'customer_id'
        ]);
        // Chain fluent methods for configuration options
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
