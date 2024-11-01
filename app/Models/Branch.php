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
        // Check if location is equal to POINT(0 0)
        return DB::table('branches')
        ->where('id', $this->id)
        ->whereRaw('ST_Equals(location, ST_GeomFromText(\'POINT(0 0)\'))')
        ->exists();
    }

    public function storeLocation($longitude, $latitude) : bool
    {
        $this->location = DB::raw("ST_GeomFromText('POINT($longitude $latitude)')");
        $this->save(); 
        return true; 
    }

    public function getCoordinates()
    {
        // Use raw SQL to convert POINT to text
        $locationText = DB::select('SELECT ST_AsText(location) as location FROM branches WHERE id = ?', [$this->id]);

        if ($locationText && isset($locationText[0]->location)) {
            $location = $locationText[0]->location;

            // Extract coordinates using regex
            preg_match('/POINT\(([^ ]+) ([^ ]+)\)/', $location, $matches);

            if (count($matches) === 3) {
                $longitude = $matches[1]; // First value is longitude
                $latitude = $matches[2]; // Second value is latitude
                
                return [
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                ];
            }
        }

        // Return null if coordinates are not found
        return null;
    }

    
}
