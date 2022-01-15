<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'idTransactionHeader',
        'furnitureName',
        'furniturePrice',
        'quantity',
        'subTotal',

    ];
    public function TransactionHeader(){
        return $this->belongsTo(TransactionHeader::class);
    }
}
