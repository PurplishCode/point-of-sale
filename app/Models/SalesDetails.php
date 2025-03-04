<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetails extends Model
{
    use HasFactory;

    protected $table = 'sales_details';
    protected $primaryKey = 'id';
    protected $fillable = ['sales_id', 'product_id', 'quantity', 'price', 'total'];

    public function sales()
    {
        return $this->belongsTo(Sales::class, 'sales_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
