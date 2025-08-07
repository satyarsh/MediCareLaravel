<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItems extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'OrderID',
        'MedicineID',
        'Quantity',
        'Price',
    ];

    public function medication(): BelongsTo
    {
        return $this->belongsTo(Medications::class);
    }
}
