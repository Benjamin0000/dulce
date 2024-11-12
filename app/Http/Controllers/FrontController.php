<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth, Storage;  
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\User;
use App\Models\Order; 
use App\Models\Item; 


class FrontController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('guest', except: ['sales_point']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     */
    public function login_page()
    {
        return view('app.login'); 
    }
    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username'=>['required', 'max:100'],
            'password'=>['required', 'max:100']
        ]); 
        $username = $request->input('username'); 
        $password = $request->input('password'); 

        $user = User::where('username', $username)->first(); 
        if(!$user){
            return back()->with('error', 'Invalid Username')->withInput();
        }
        if(!password_verify($password, $user->password))
            return back()->with('error', 'Invalid Password')->withInput();
        
        Auth::login($user); 
        return redirect(route('admin.dashboard.index')); 
    }

    public function payment($order_id)
    {
        $order = Order::where('orderID', $order_id)->first(); 
        return view('monify.payment', compact('order')); 
    }

    public function payment_success()
    {
        return view('monify.success'); 
    }

    public function payment_canceled()
    {
        return view('monify.canceled'); 
    }

    public function process_payment($order_id)
    {
        $find = Order::find($order_id);
        if($find){
            $find->paid = 1; 
            $find->save(); 
        }
    }


    public function sales_point(string $branch_id)
    {
        $items = Item::where('branch_id', $branch_id)
        ->where('type', ITEM)->orderBy('parent_id')->get();
        foreach($items as $item){
            $item->logo = asset(Storage::url($item->logo));
        }
        $items = $items->all();
        return view('sales_point', compact('items')); 
    }
}