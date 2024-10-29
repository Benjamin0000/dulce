<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Http\Request;
use App\Models\Branch; 

class SettingsController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            'auth'
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index($branch_id)
    {
        $branch = Branch::findOrFail($branch_id); 
        return view('app.settings.index', compact('branch')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function set_location($branch_id, Request $request)
    {
        $branch = Branch::findOrFail($branch_id); 
        $request->validate([
            'longitude'=>['required', 'max:100'],
            'latitude'=>['required', 'max:100']
        ]); 
        $longitude = $request->input('longitude'); 
        $latitude = $request->input('latitude'); 
        if( $branch->storeLocation($longitude, $latitude) ){
            return ['success'=>'done']; 
        }
        return ['error'=>'could not save location']; 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
