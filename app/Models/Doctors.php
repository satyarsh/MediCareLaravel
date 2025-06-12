<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'doctors';

    /**
     * @var string
     */
    protected $primaryKey = 'DoctorID';

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
        'ClinicName',
        'PhoneNumber',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'DoctorID' => 'integer',
    ];
}
