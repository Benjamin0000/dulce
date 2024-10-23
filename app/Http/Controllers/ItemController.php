<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Storage; 
use App\Models\Branch; 
use App\Models\User; 
use App\Models\Item; 
use App\Models\Addon; 

class ItemController extends Controller implements HasMiddleware
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
    public function index(string $branch_id, string $parent_id=NULL)
    {
        $branch = Branch::findOrFail($branch_id); 
        $titles = [];
        $parent = NULL; 
        if($parent_id) {
            $items = Item::where([
                ['branch_id', $branch_id],  
                ['parent_id', $parent_id]
            ])->paginate(20);
            $titles = get_item_category_gen($parent_id);
            $parent = Item::find($parent_id); 
        }else {
            $items = Item::where('branch_id', $branch_id)
            ->whereNull('parent_id')->paginate(20);
        }
        return view('app.items.index', compact('branch', 'items', 'parent_id', 'titles', 'parent')); 
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create_item(Request $request)
    {
        $type = (int)$request->input('type');
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|mimes:jpeg,png,jpg,gif,webp',
            'description'=> 'nullable|max:255',
        ]);
        $description = $request->input('description'); 
        $response_name = "Category"; 
        if($type == ITEM){
            $request->validate([
                'cost_price'=>'required',
                'selling_price'=>'required'
            ]);
            $cost_price = (float)$request->input('cost_price'); 
            $selling_price = (float)$request->input('selling_price'); 
            if($cost_price > $selling_price)
                return ['error'=>"The selling price must be greater than the cost price"]; 
            $response_name = "Item"; 
        }
        $logo = $request->file('logo');
        $upload = upload_poster($logo, 100);
        if(isset($upload['error'])) return $upload;
        $logo = $upload['path'];
        $data = $request->all(); 
        $data['des'] = $description; 
        $data['logo'] = $logo; 
        Item::create($data); 
        return ['success'=>"$response_name added"];    
    }

    public function update_item(Request $request)
    {
        $type = (int)$request->input('type');
        $id = (int)$request->input('id'); 
        $item = Item::findOrFail($id); 
        $description = $request->input('description');

        $request->validate([
            'name' => 'required|string|max:255',
            'description'=> 'nullable|max:255',
            'logo' => 'nullable|mimes:jpeg,png,jpg,gif,webp',
        ]);
        $response_name = "Category"; 
        if($type == ITEM){
            $request->validate([
                'cost_price'=>'required',
                'selling_price'=>'required'
            ]);
            $cost_price = (float)$request->input('cost_price'); 
            $selling_price = (float)$request->input('selling_price'); 
            if($cost_price > $selling_price)
                return ['error'=>"The selling price must be greater than the cost price"]; 
            $response_name = "Item"; 
        }
        
        $data = $request->all();
        $logo = $request->file('logo');
        if($logo){
            $upload = upload_poster($logo, 100);
            if(isset($upload['error'])) return $upload;
            $logo = $upload['path'];
            $data['logo'] = $logo; 

            if(Storage::disk('public')->exists($item->logo))
                Storage::disk('public')->delete($item->logo);
        }

        $data['des'] = $description; 
        $item->update($data); 
        return ['success'=>"$response_name updated"];    
    }

    public function delete_item($id)
    {
        $item = Item::findOrFail($id); 
        if($item->type == CATEGORY && $item->has_children())
            return back()->with('error', "You can't delete a category with items. Delete the items in the category first"); 
        
        if(Storage::disk('public')->exists($item->logo))
            Storage::disk('public')->delete($item->logo);

        if($item->type == CATEGORY){
            delete_addons(CATEGORY, $id);
        }elseif($item->type == ITEM){
            delete_addons(ITEM, $id);
        }
        $item->delete(); 
        return back()->with('success', "Item deleted"); 
    }

    public function add_addon(Request $request)
    {
        $request->validate([
            'question'=>['required', 'max:255'],
            'category'=>['required', 'max:255', 'exists:items,id'],
            'branch_id'=>['required', 'max:255', 'exists:branches,id'],
            'item_id'=>['required', 'max:255', 'exists:items,id']
        ]); 

        $branch_id = $request->input('branch_id'); 
        $item_id = $request->input('item_id'); 
        $category = $request->input('category'); 
        $question = $request->input('question');

        $check = Addon::where([
            ['branch_id', $branch_id],
            ['item_id', $item_id],
            ['category', $category]
        ])->exists();

        if($check)
            return ['error'=>'Already added']; 

        Addon::create([
            'branch_id'=>$branch_id,
            'item_id'=>$item_id, 
            'category'=>$category,
            'title'=>$question
        ]); 
        $addons = Addon::where('item_id', $item_id)->get();
        $view = view('app.items.add_ons_tbody', compact('addons')); 
        return ['success'=>'Add-on Added', 'view'=>"$view", 'id'=>$item_id]; 
    }

    public function remove_addon(Request $request)
    {
        $request->validate([
            'id'=>['required', 'max:255']
        ]); 
        $id = $request->input('id');
        $addon = Addon::find($id); 
        if($addon){
            $item_id = $addon->item_id; 
            $addon->delete();
            $addons = Addon::where('item_id', $item_id)->get();
            $view = view('app.items.add_ons_tbody', compact('addons')); 
            return ['success'=>'Deleted', 'view'=>"$view", 'id'=>$item_id]; 
        }
        return ['error'=>'Not Found']; 
    }
}
