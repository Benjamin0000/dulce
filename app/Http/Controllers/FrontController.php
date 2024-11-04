<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Models\User;
use App\Models\Order; 

class FrontController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            'guest'
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
}
