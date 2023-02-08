<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table_Customer extends Model
{
    use HasFactory;

    protected $table = "table_customer";
    protected $fillable = ['id', 'name', 'contact_number', 'address'];
}
