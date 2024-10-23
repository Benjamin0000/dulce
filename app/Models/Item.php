<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'branch_id',
        'name',
        'logo',
        'parent_id',
        'cost_price',
        'selling_price',
        'type',
        'des'
    ]; 

    public function total_childeren()
    {
        return self::where('parent_id', $this->id)->count();
    }

    public function has_children()
    {
        return self::where('parent_id', $this->id)->exists();
    }

    public function addons()
    {
        return $this->hasMany(Addon::class, 'item_id'); 
    }
}
