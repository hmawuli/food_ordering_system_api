<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table_Food_Product extends Model
{
    use HasFactory;
    protected $table = "table_food_product";
    protected $fillable = ['id', 'name', 'description', 'price'];

}
