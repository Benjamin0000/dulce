<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;  
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Auth; 
use App\Models\Item; 
use App\Models\Addon; 
use App\Models\Discount; 
use App\Models\Location; 
use App\Models\Cart; 
use App\Models\Order; 
use App\Models\User; 

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


    public function process_order(Request $request, string $branch_id)
    {
        $branch = Branch::find($branch_id); 
        if(!$branch)
            return ['error'=>"Branch not found"]; 

        $request->validate([
            'fullname' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'is_pickup' => 'required|in:yes,no',
            'address' => 'nullable|string|max:500',
            'pined_location' => 'nullable|string|max:50',
            'selected_location' => 'nullable|exists:locations,id', // Assuming you have a locations table
            'pickup_time' => 'nullable|date',
            'pickup_date' => 'nullable|date',
            'discount_code' => 'nullable|string|max:50',
            'note' => 'nullable|string|max:1000',
        ]);
        sign_user_in(); 
        $discount_code = $request->discount_code;
        $items = $request->items; 
        $discount_pct = 0; 
        $delivery_cost = 0; 
        $region = ""; 
        $vat = $branch->vat; 
        $total = 0; 
        $total_cost = 0; 
        $signdIn = Auth::user(); 

        $is_pickup = $request->is_pickup === 'yes'; 

        if($discount_code){
            if($discount = get_discount_code($discount_code, $branch_id)){
                $discount_pct = $discount->pct;
            }
        }

        if(!$is_pickup){
            $Location = Location::find($request->selected_location);
            $delivery_cost = $Location->cost;
            $region = $Location->region;
        }
         
        $total_cost = $total = sum_total($items);

        if($discount_pct) //apply discount 
            $total_cost -= ( $discount_pct/100 ) * $total_cost; 

        $vat_cost = $vat ? ($vat/100) * $total_cost : 0; //set vat 

        $total_cost += $vat_cost; 

        if($delivery_cost) //set delivery cost 
            $total_cost += $delivery_cost; 

        $token = null;
        // Create a new Order
        $order = new Order();

        $user = $signdIn;
        if(!$user){
            $user = User::create([ 'name'=>$request->fullname ]);
            $token = $user->createToken('mobile-app-token')->plainTextToken;
        }

        $order->user_id = $user->id;
        $order->branch_id = $branch->id; 
        $order->branch_name = $branch->name; 
        $order->orderID = generateOrderId(); 
        $order->fullname = $request->fullname;
        $order->mobile_number = $request->mobile_number;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->location = $request->pined_location;
        $order->is_pickup = $is_pickup;
        $order->location_name = $region;
        $order->delivery_fee = $delivery_cost;

        $order->pickup_time = $request->pickup_time;
        $order->pickup_date = $request->pickup_date;
        $order->discount_code = $discount_code;
        $order->discount = $discount_pct; 

        $order->total = $total;
        $order->total_cost = $total_cost; 
        $order->vat = $vat; 
        // $order->vat_cost = $vat_cost; 
        $order->online = 1; 
        $order->note = $request->note;
        $order->save();
    
        // Save order items
        foreach($items as $item) {
            $orderItem = new Cart();
            $orderItem->order_id = $order->id;
            $orderItem->item_id = $item['id'];
            $orderItem->item_name = $item['name'];
            $orderItem->price = $item['price']; 
            $orderItem->qty = $item['qty'];
            $orderItem->save();
        }

        return [
            'token'=>$token,
            'url'=>route('payment_processor', $order->orderID)
        ]; 
    }

    public function get_order_history()
    {
        sign_user_in(); 
        $user = Auth::user(); 
        if(!$user) return ['orders'=>[]];

        $orders = Order::where([ ['user_id', $user->id], ['paid', 1] ])->latest()->paginate(10);
        return [
            'orders'=>$orders->all()   
        ]; 
    }

    public function get_cart_items($order_id)
    {   
        $items = Cart::where('order_id', $order_id)->paginate(10); 
        return [
            'items'=>$items->all()
        ]; 
    }
}
