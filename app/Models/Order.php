<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $appends = ['vat_cost'];

    public function getVatCostAttribute()
    { 
        $vat = $this->vat; 
        $total = $this->total;
        if($discount = $this->discount){
            $total -= ($discount/100) * $total; 
        }
        
        return $vat ? ($vat/100) * $total : 0; //set vat 
    }
    
}
