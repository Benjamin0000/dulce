<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;  
use Illuminate\Support\Facades\Storage; 
use App\Models\Item; 
use App\Models\Addon; 
use App\Models\Discount; 
use App\Models\Location; 

class ApiController extends Controller
{

    public function get_branches(string $branch_id = null)
    { 
        $branches = Branch::all(); 
        foreach ($branches as $branch) {
            $branch->poster = asset(Storage::url($branch->poster));
        }

        $branch = null; 
        $items = []; 

        if($branch_id){
            if( $branch = Branch::find($branch_id) )
                $branch->poster = asset(Storage::url($branch->poster));
        }

        if(!$branch && isset($branches[0]))
            $branch = $branches[0]; 

        if($branch)
            $items = Item::where('branch_id', $branch->id)->whereNull('parent_id')->get(); 

        foreach($items as $item){
            $item->logo = asset(Storage::url($item->logo));
        }

        return [
            'items'=>$items,
            'branches'=>$branches
        ]; 
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

    public function get_item(string $id)
    {
        $item = Item::find($id); 

        if($item){
            $item->logo = asset(Storage::url($item->logo));
            $addons = $item->addons; 

            foreach($addons as $addon){
                $items = Item::where('parent_id', $addon->category)->get(); 
                
                foreach($items as $item2){
                    $item2->logo = asset(Storage::url($item2->logo));
                }

                $addon['items'] = $items;
            }

            $item['addons'] = $addons; 

            return [
                'item'=>$item
            ];
        }
        return ['item'=>'']; 
    }

    public function get_delivery_cost(Request $request)
    {
        
    }

    public function get_discounts_and_locations($branch_id)
    {
        $branch = Branch::find($branch_id); 
        if(!$branch) return []; 
        return [
            'discounts'=>$branch->get_valid_discounts(),
            'locations'=>$branch->get_delivery_locations(),
        ]; 
    }


    public function validate_discount_code(Request $request)
    {
        $request->validate([
            'code'=>['required'], 
            'branch_id'=>['required']
        ]); 

        $code = $request->input('code');
        $branch_id = $request->input('branch_id'); 

        $discount = Discount::where([
            ['code', $code], 
            ['branch_id', $branch_id], 
            ['expiry_date', '>', now()]
        ])->first(); 

        if($discount){
            return $discount; 
        }

        return ['error'=>"Invalid code"]; 
    }


    public function process_order(Request $request)
    {
        
    }
}
