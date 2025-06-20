<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'patients';

    /**
     * @var string
     */
    protected $primaryKey = 'PatientID';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = [
        'FirstName',
        'LastName',
        'DateOfBirth',
        'PhoneNumber',
        'HomeAddress',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'PatientID' => 'integer',
        'DateOfBirth' => 'date',
    ];
}
