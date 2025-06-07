<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medications extends Model
{
    /**
     * @var string
     */
    protected $table = 'medications';

    /**
     * @var string
     */
    protected $primaryKey = 'MedicationID';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'Name',
        'GenericName',
        'Strength',
        'Form',
        'ManufacturerID',
        'RequiresPrescription',
        'DefaultUnitPrice',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'MedicationID' => 'integer',
        'ManufacturerID' => 'integer',
        'RequiresPrescription' => 'boolean',
        'DefaultUnitPrice' => 'decimal:2',
    ];

    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturers::class, 'ManufacturerID');
    }
}
