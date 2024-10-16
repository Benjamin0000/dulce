<?php 
use App\Models\Item; 
use App\Models\Branch; 

CONST CATEGORY = 0; 
CONST ITEM = 1; 

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