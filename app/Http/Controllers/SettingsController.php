<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Http\Request;
use App\Models\Branch; 
use App\Models\Discount; 
use App\Models\DeliveryCost; 
use App\Models\Location;

class SettingsController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            'auth'
        ];
    }

    public function index(string $branch_id)
    {
        $branch = Branch::findOrFail($branch_id); 
        $discounts = Discount::where('branch_id', $branch_id)->latest()->paginate(10); 
        $locations = Location::where('branch_id', $branch_id)->latest()->paginate(10); 
        return view('app.settings.index', compact('branch', 'discounts', 'locations')); 
    }

    public function load_more_discounts(string $branch_id)
    {
        $discounts = Discount::where('branch_id', $branch_id)->latest()->paginate(10); 
        $view = view('app.settings.includes.discount_table', compact('discounts')); 
        return [
            'view'=>"$view"
        ]; 
    }

    public function load_more_location(string $branch_id)
    {
        $locations = Location::where('branch_id', $branch_id)->latest()->paginate(10);
        $view = view('app.settings.includes.location_table', compact('locations'));
        return [
            'view'=>"$view"
        ]; 
    }

    public function set_location(string $branch_id, Request $request)
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

    public function set_vat(string $branch_id, Request $request)
    {
        $vat = $request->input('vat'); 
        $branch = Branch::findOrFail($branch_id); 
        $branch->vat = $vat; 
        $branch->save(); 
        return ['success'=>'Vat has been set']; 
    }

    public function set_service_fee(string $branch_id, Request $request)
    {
        $fee = $request->input('service_fee');
        $branch = Branch::findOrFail($branch_id);
        $branch->service_fee = $fee;
        $branch->save(); 
        return ['success'=>'Service fee has been set']; 
    }

    public function create_discount(string $branch_id, Request $request)
    {
        Branch::findOrFail($branch_id);
        $request->validate([
            'code'=>['required', 'max:100'],
            'days'=>['required', 'max:100'],
            'min_purchase'=>['required', 'max:100'], 
            'pct'=>['required']
        ]); 
        $code = $request->input('code'); 
        $days = (int)$request->input('days');
        $min_purchase = $request->input('min_purchase'); 
        $pct = $request->input('pct');

        if( Discount::where('code', $code)->exists())
            return ['error'=>'discount code already exists']; 
        
        Discount::create([
            'branch_id'=>$branch_id,
            'code'=>$code, 
            'min_purchase'=>$min_purchase, 
            'expiry_date'=>now()->addDays($days),
            'pct'=>$pct 
        ]); 
        return ['success'=>'Discount created']; 
    }

    public function create_delivery_cost(string $branch_id, Request $request)
    {
        $branch = Branch::findOrFail($branch_id);
        $request->validate([
            'max_km'=>['required', 'max:1000000'],
            'cost'=>['required', 'max:10000000']
        ]); 

        $max_km = $request->input('max_km'); 
        $cost = $request->input('cost'); 

        $branch->max_km = $max_km; 
        $branch->cost_per_km = $cost; 
        $branch->save(); 
        return ['success'=>'Delivery Data set']; 
    }

    public function delete_discount($id)
    {
        $discount = Discount::findOrFail($id); 
        $discount->delete(); 
        return back()->with('success', 'Discount Code Deleted'); 
    }
    
    public function create_location(Request $request, string $branch_id)
    {
        $request->validate([
            'region'=>['required', 'max:100'],
            'cost'=>['required', 'numeric', 'max:10000000']
        ]); 

        $region = $request->input('region'); 
        $cost = $request->input('cost'); 

        Location::create([
            'branch_id'=>$branch_id,
            'region'=>$region,
            'cost'=>$cost 
        ]);
        return ['success'=>'Location addded']; 
    }

    public function delete_location(string $id)
    {
        $location = Location::findOrFail($id); 
        $location->delete(); 
        return back()->with('success', 'location deleted'); 
    }
}
