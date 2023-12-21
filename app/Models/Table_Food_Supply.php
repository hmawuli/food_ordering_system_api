<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table_Food_Supply extends Model
{
    use HasFactory;
    protected $table = "table_food_supply";
    protected $fillable = ['id', 'name', 'quantity', 'date','amount'];

}
