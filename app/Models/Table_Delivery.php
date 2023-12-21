<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table_Delivery extends Model
{
    use HasFactory;
    protected $table = "table_delivery";
    protected $fillable = ['id', 'customer_id', 'food_id', 'quantity','payment','date'];
}
