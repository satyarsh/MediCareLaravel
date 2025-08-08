<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medications extends Model
{

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
        'Stock'
    ];

    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturers::class, 'ManufacturerID', 'ManufacturerID');
    }

    public function getDisplayNameAttribute()
    {
        $name = $this->Name;
        if ($this->Strength) {
            $name .= ' ' . $this->Strength;
        }
        if ($this->Form) {
            $name .= ' (' . $this->Form . ')';
        }
        return $name;
    }

    public function getBadgeAttribute()
    {
        if ($this->Stock > 100) {
            return ['text' => 'Popular', 'class' => 'bg-blue-500'];
        } elseif ($this->Stock <= 10 && $this->Stock > 0) {
            return ['text' => 'Low Stock', 'class' => 'bg-red-500'];
        } elseif ($this->MedicationID > (Medications::max('MedicationID') - 4)) {
            return ['text' => 'New', 'class' => 'bg-green-500'];
        }
        return null;
    }
}
