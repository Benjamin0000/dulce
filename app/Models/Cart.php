<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $appends = ['logo'];

    protected $fillable = [ 
        'order_id',
        'item_id',
        'item_name',
        'price', 
        'qty'
    ]; 

    public function getLogoAttribute()
    {
        $item = Item::find($this->item_id);
        if($item)
            return asset($item->logo); // Customize as needed
        return ""; 
    }
}
