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

    public function medication()
    {
        return $this->belongsTo(Medications::class, 'MedicationID', 'MedicationID');
    }
}
