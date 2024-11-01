<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'poster', 
        'state',
        'city',
        'address',
        'location'
    ]; 

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
    /**
     * Check if the restaurant location is not set
     *
     * @return bool
     */
    public function isLocationNotSet(): bool
    {
        return $this->location ? false : true; 
    }

    public function storeLocation($longitude, $latitude) : bool
    {
        $this->location = "$longitude,$latitude";
        $this->save(); 
        return true; 
    }

    public function getCoordinates()
    {
        $location = explode(',', $this->location); 
       
        return [
            'latitude' => $location[0],
            'longitude' => $location[1],
        ];

    }

    
}
