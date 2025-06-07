<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
     /**
     * @var string
     */
    protected $table = 'inventory';

    /**
     * @var string
     */
    protected $primaryKey = 'InventoryID';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = [
        'MedicationID',
        'BatchNumber',
        'ExpiryDate',
        'QuantityOnHand',
        'PurchasePrice',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'InventoryID' => 'integer',
        'MedicationID' => 'integer',
        'ExpiryDate' => 'date',
        'QuantityOnHand' => 'integer',
        'PurchasePrice' => 'decimal:2',
    ];

    public function medication(): BelongsTo
    {
        return $this->belongsTo(Medications::class, 'MedicationID');
    }
}
