<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentMethod;

class Motel extends Model
{
    use HasFactory;

    protected $table = 'motels';

    protected $fillable = [
        'name_of_persion',
        'phone_number',
        'check_in',
        'payment_method_id',
        'note',
    ];

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'id_payment_method');
    }

}
