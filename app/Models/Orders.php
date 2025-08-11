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
     * @var string
     */
    protected $primaryKey = 'OrderID';

    protected $table = 'orders';
    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
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
