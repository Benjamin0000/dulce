<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'branch_id',
        'item_id',
        'title', 
        'category'
    ]; 

    public function the_category()
    {
        return $this->belongsTo(Item::class, 'category', 'id');
    }
}
