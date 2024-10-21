<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'item_id',
        'name',
        'cost_price',
        'selling_price',
        'qty',
        'sold',
    ]; 
}
