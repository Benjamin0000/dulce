<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;  
use Illuminate\Support\Facades\Storage; 
use App\Models\Item; 

class ApiController extends Controller
{

    public function get_branches()
    {
        // $branches = Branch::all(); 
        // foreach ($branches as $branch) {
        //     $branch->poster = asset(Storage::url($branch->poster));
        // }
        // return $branches;
        $items = Item::whereNull('parent_id')->get(); 

        foreach($items as $item){
            $item->logo = asset(Storage::url($item->logo));
        }
        return $items; 

        // $branch = Branch::first(); 
        // $branch->poster = asset(Storage::url($branch->poster));
    }

    public function get_more_items(string $parent_id)
    {
        $items = Item::where('parent_id', $parent_id)->paginate(10); 
        foreach($items as $item){
            $item->logo = asset(Storage::url($item->logo));
        }
        return [
            'data'=>$items->all()   
        ]; 
    }
}
