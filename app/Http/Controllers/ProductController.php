<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Session;
class ProductController extends Controller
{
    //
    public function index()
    {
        $infos = Product::all();

        return view('product',['products' => $infos]);
    }

    public function detail($id){

        $info = Product::find($id);

        return view('detail',['product' => $info]);
    }

    public function search(Request $request){

        $data = Product::where('name','like', '%'.$request->input('query').'%')
        ->get();

        return view('search',['products'=>$data]);
    }

    public function addToCart(Request $request){
        if($request->session()->has('user'))
        {
            $cart = new Cart;
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $request->product_id;
            $cart->save();
           return redirect()->route('home');
        }
        else
        {
            return redirect()->route('signin');
        }
    }
    
    static function cartItem(){
        $user_id = session::get('user')['id'];
        return Cart::where('user_id',$user_id)->count();
    }

    public function showCartList(){
        $user_id = Session::get('user')['id'];

        $products = DB::table('cart')
        ->join('products', 'cart.product_id', 'products.id')
        ->where('cart.user_id',$user_id)
        ->select('products.*', 'cart.id as cart_id')->get();

        return view('cartList', ['products' => $products]);
    }

    public function removeCart($id){
        Cart::destroy($id);

        return redirect()->route('cart_list');
    }

    public function OrderNow(){
        
        if(session()->has('user')){
        $user_id = Session::get('user')['id'];

        $total = DB::table('cart')
        ->join('products', 'cart.product_id', 'products.id')
        ->where('cart.user_id',$user_id)
        ->sum('products.price');

        return view('ordernow', ['total' => $total]);
        }
        else{
            return "Please Login First.";
        }
    }

    public function placeOrder(Request $request){

        $user_id = Session::get('user')['id'];
        $all_cart_item = Cart::where('user_id', $user_id)->get();
       
        foreach($all_cart_item as $cart_item){
            $order = new Order;

            $order->product_id = $cart_item['product_id'];
            $order->user_id = $cart_item['user_id'];
            $order->status = "pending";
            $order->payment_method = $request->payment_method;
            $order->payment_status = "pending";
            $order->address = $request->address;

            $order->save();
            Cart::where('user_id', $user_id)->delete();

        }

        return redirect()->route('home');
    }

    public function myOrders(){
        $user_id = Session::get('user')['id'];

        $orders = DB::table('orders')
        ->join('products', 'orders.product_id', 'products.id')
        ->where('orders.user_id',$user_id)
        ->get();
        
        return view('myorders', ['orders' => $orders]);
    }
}
