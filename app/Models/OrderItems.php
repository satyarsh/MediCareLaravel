<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $primaryKey = 'OrderItemID';

    protected $table = 'order_items';
    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * @var array
     */
    protected $fillable = [
        'OrderID',
        'MedicationID',
        'Quantity',
        'Price'
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class, 'OrderID', 'OrderID');
    }

    public function medication()
    {
        return $this->belongsTo(Medications::class, 'MedicationID', 'MedicationID');
    }
}
