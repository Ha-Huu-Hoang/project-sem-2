<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table ='orders';
    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $fillable = [
        'first_name',
        'last_name',
        'user_id',
        'country',
        'street_address',
        'town_city',
        'postcode_zip',
        'phone',
        'email',
        'total',
        'payment_method',
        "status",
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
