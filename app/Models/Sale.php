<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Product;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','target_ammount','customer_id','quantity','paid_ammount'];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
