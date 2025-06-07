<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturers extends Model
{
    
    /**
     * @var string
     */
    protected $table = 'manufacturers';

    /**
     * @var string
     */
    protected $primaryKey = 'ManufacturerID';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'Name',
        'ContactPhone',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'ManufacturerID' => 'integer',
    ];
}
