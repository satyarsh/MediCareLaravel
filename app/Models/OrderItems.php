<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
