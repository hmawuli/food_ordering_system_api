<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table_Transaction_Reports extends Model
{
    use HasFactory;
    protected $table = "table_transaction_reports";
    protected $fillable = ['id', 'order_id', 'customer_id', 'food_id','supply_id','delivery_id','date'];
}
