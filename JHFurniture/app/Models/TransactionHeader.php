<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;
    protected $fillable = [
        'idUser',
        'transactionDate',
        'method',
        'cardNumber',
        'total',

    ];

    public function TransactionDetail(){
        return $this->hasMany(TransactionDetail::class, 'idTransactionHeader', 'id');
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
