<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'PatientID',
        'MedicineId',
        'Quantity',
        'Price',
    ];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
