<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Http\Request;
use App\Models\Item; 

class StockController extends Controller implements HasMiddleware
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
    public function index(string $branch_id)
    {
        $items = Item::where([ 
            ['type', ITEM], 
            ['branch_id', $branch_id] 
        ])->paginate(20); 
        return view('app.stock.index', compact('items', 'branch_id')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function update_stock(Request $request)
    {
        $request->validate([
            'item_id'=>['required', 'max:255', 'exists:items,id'],
            'branch_id'=>['required', 'max:255', 'exists:branches,id'],
            'qty'=>['required', 'numeric']
        ]); 

        $branch_id = $request->input('branch_id'); 
        $item_id = $request->input('item_id'); 
        $total = $request->input('qty');

        $item = Item::where([  
            ['id', $item_id],
            ['branch_id', $branch_id]
        ])->first(); 

        if(!$item) return; 

        $item->total = $total; 
        $item->save(); 
        return ['success'=>"Quantity Added"]; 
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
