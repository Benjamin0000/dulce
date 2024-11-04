<?php 
use App\Models\Item; 
use App\Models\Branch; 
use App\Models\Addon; 
use App\Models\Order; 
use App\Models\Discount; 

CONST CATEGORY = 0; 
CONST ITEM = 1; 
CONST BRANCH = 2; 

function format_with_cur($amt)
{
    return "₦".number_format($amt, 2); 
}

function tableNumber( int $total ) : int
{
    if( request()->page && request()->page != 1 )
        return ( request()->page*$total ) - $total + 1;
    return 1;
}

function upload_poster($file, $maxSizeInKB)
{
    $fileSize = $file->getSize(); // size in bytes
    $fileSizeInKB = $fileSize / 1024;

    if ($fileSizeInKB > $maxSizeInKB) 
        return ['error' => "The image must not exceed $maxSizeInKB Kb in size."];

    $path = $file->storePublicly('images', 'public');
    return ['path'=>$path];
}

function get_item_category_gen(string $parent_id, array $gens=[])
{
    $item = Item::find($parent_id); 
    if($item){
        $gens[] = $parent_id; 
        if($parent_id = $item->parent_id)
            return get_item_category_gen($parent_id, $gens);
    }
    $titles = []; 
    foreach($gens as $id){
        if( $item = Item::find($id) )
            $titles[] = $item->name;
    }
    return array_reverse($titles); 
}

function get_branches()
{
    return Branch::pluck('name', 'id')->all();
}

function get_addons()
{
    $valid_adons = []; 
    $items = Item::where('type', CATEGORY)->get();
    $total = 0; 
    foreach($items as $item){
        $has_items = Item::where([ ['parent_id', $item->id], ['type', ITEM] ])->exists(); 
        if($has_items){
            $valid_adons[] = $item;
            $total+=1; 
        }
        if($total >= 100) 
            break; 
    }
    return $valid_adons; 
}


function delete_addons($type, $id)
{
    switch($type){
        case BRANCH: 
            $addons = Addon::where('branch_id', $id)->get(); 
            break; 
        case ITEM: 
            $addons = Addon::where('item_id', $id)->get();
            break; 
        case CATEGORY:
            $addons = Addon::where('category', $id)->get();
            break; 
    }
    foreach($addons as $addon){
        $addon->delete(); 
    }
}

function generateOrderId() {
    return 'ORD-'. uniqid();
}

function get_discount_code($code, $branch_id)
{
    return Discount::where([
        ['code', $code], 
        ['branch_id', $branch_id], 
        ['expiry_date', '>', now()]
    ])->first(); 
}


function sum_total($items)
{
    $total = 0; 
    foreach($items as $item){
        if($product = Item::find($item['id']))
            $total += $product->selling_price * $item['qty']; 
    }
    return $total; 
}
