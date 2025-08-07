<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Orders extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'PatientID',
        'OrderNumber',
        'TotalAmount',
        'Status',
        'ShippingAddress',
        'PaymentMethod',
        'PaymentStatus',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItems::class);
    }
}
