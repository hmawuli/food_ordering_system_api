<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table_Order_Details extends Model
{
    use HasFactory;
    protected $table = "table_order_details";
    protected $fillable = ['id', 'customer_id', 'food_id','delivery_id','quantity', 'date'];

}
