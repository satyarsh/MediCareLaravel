<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prescriptions extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'prescriptions';

    /**
     * @var string
     */
    protected $primaryKey = 'PrescriptionID';

    /**
     * @var bool
     */
    public $timestamps = true;

    protected $fillable = [
        'PatientID',
        'DoctorID',
        'MedicationID',
        'PrescriptionDate',
        'Dosage',
        'QuantityPrescribed',
        'RefillsAllowed',
        'RefillsRemaining',
    ];

    protected $casts = [
        'PrescriptionID' => 'integer',
        'PatientID' => 'integer',
        'DoctorID' => 'integer',
        'MedicationID' => 'integer',
        'PrescriptionDate' => 'date',
        'QuantityPrescribed' => 'integer',
        'RefillsAllowed' => 'integer',
        'RefillsRemaining' => 'integer',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patients::class, 'PatientID');
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctors::class, 'DoctorID');
    }

    public function medication(): BelongsTo
    {
        return $this->belongsTo(Medications::class, 'MedicationID');
    }
}
