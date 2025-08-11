<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $primaryKey = 'CartItemID';

    protected $table = 'cart_items';
    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'MedicationID',
        'Quantity',
        'Price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function medication()
    {
        return $this->belongsTo(Medications::class, 'MedicationID', 'MedicationID');
    }
}
