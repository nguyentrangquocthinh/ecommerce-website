<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

use Illuminate\Support\Facades\Session;

use Stripe;

use RealRashid\SweetAlert\Facades\Alert;
    

class HomeController extends Controller
{
       
    // check the user type value when user login 
    /* 
    user = 0
    admin = 1
    */
        public function redirect() 
    {
        $usertype=Auth::user()->usertype;
        if ($usertype == '1') {
            $total_product = Product::all()->count(); // count function for total productin database
            
            $total_order = Order::all()->count(); 

            $total_user = User::all()->count(); 

            $order = Order::all();
            
            $total_revenue = 0;
            foreach($order as $order) {
                $total_revenue += $order->price; 
            }

            $total_delivered = Order::where('delivery_status', '=', 'Đã giao hàng')->get()->count();
            
            $total_processing = Order::where('delivery_status', '=', 'Đang xử lỷ')->get()->count();

            return view('admin.home', compact('total_product', 'total_order', 'total_user', 'total_revenue', 'total_delivered', 'total_processing'));
            
        } else { 
            $product = Product::paginate(9);

            return view('home.userpage', compact('product'));
        }
    }

    // review
    public function review() 
    {
        return view('home.review');
    }

    public function index() 
    {
        $product = Product::paginate(9);

        return view('home.userpage', compact('product'));
    }

    // product detail 
    public function product_details($id) 
    {
        $product = Product::find($id);

        return view('home.product_details', compact('product'));
    }

    // add product to cart
    public function add_cart(Request $request, $id) 
    {
        // check if user logged in or not
        if(Auth::id()) {
            $user = Auth::user(); // get the logged in user data
            $userId = $user->id;
            $product = Product::find($id);

            $product_exist_id = Cart::where('product_id', '=' ,$id)->where('user_id', '=', $userId)->get('id')->first();

            if($product_exist_id) {
                $cart = Cart::find($product_exist_id)->first();

                $quantity = $cart->quantity;

                $cart->quantity = $quantity + $request->quantity;
                    
                if($product->discount_price != null) {
                    $cart->price = $product->discount_price * $cart->quantity;
                } else {
                    $cart->price = $product->price * $cart->quantity;
                }

                $cart->save();

                return redirect()->back()->with('message', 'Sản phẩm đã được thêm vào giỏ hàng');


          
            
                    
            } else {

                $cart = new Cart;
    
                $cart->name = $user->name;
    
                $cart->email = $user->email;
    
                $cart->phone = $user->phone;
    
                $cart->address = $user->address;
    
                $cart->user_id = $user->id;
    
                $cart->product_title = $product->title;
    
                $cart->price = $product->price * $request->quantity;
    
                $cart->image = $product->image;
    
                $cart->product_id = $product->id;
    
                $cart->quantity = $request->quantity;
    
                $cart->save();

                return redirect()->back()->with('message', 'Sản phẩm đã được thêm vào giỏ hàng');
          

                
            }

        } else {
            return redirect('login');
        }
    }

    // show product from database to cart
    public function show_cart() 
    {
        if(Auth::id()){
            
            $id = Auth::user()->id; // get logged in user id and store in $id
    
            $cart = Cart::where('user_id', '=', $id)->get();
    
            return view('home.showcart', compact('cart'));
        } else {
            return redirect('login');
        }
    }

    // remove cart
    public function remove_cart($id)
    {
        $cart = Cart::find($id);

        $cart->delete();

        return redirect()->back();
    }

    // cash order
    public function cash_order()
    {
        $user = Auth::user();

        $userId = $user->id;

        // check specific user id exist or not
        $data = Cart::where('user_id', '=', $userId)->get();
        
        foreach($data as $data) {

            $order = new Order;

            $order->name = $data->name;

            $order->email = $data->email;

            $order->phone = $data->phone;

            $order->address = $data->address;

            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;

            $order->price = $data->price;

            $order->quantity = $data->quantity;            

            $order->image = $data->image;

            $order->product_id = $data->product_id;

            $order->payment_status = 'Cash on delivery';

            $order->delivery_status = 'Đang xử lý';

            $order->save();

            // delete cart when chooser cash on delivery
            $cart_id = $data->id;

            $cart = Cart::find($cart_id);

            $cart->delete();
        }

        return redirect()->back()->with('message', 'Đơn hàng đang được tiến hành thanh toán');


    }   

    // pay card 
    public function stripe($formattedTotalPrice) 
    {
        return view('home.stripe', compact('formattedTotalPrice'));
    }

    //  stripe 
    public function stripePost(Request $request, $formattedTotalPrice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $vndTotalPrice = str_replace('.', '', $formattedTotalPrice); // Loại bỏ dấu phẩy
        $vndTotalPrice = (float) $vndTotalPrice;

        // change VND to USD
        $usdTotalPrice = $vndTotalPrice / 23000; 

        Stripe\Charge::create([
            "amount" => ceil($usdTotalPrice * 100), 
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for payment"
        ]);

        $user = Auth::user();

        $userId = $user->id;

        // check specific user id exist or not
        $data = Cart::where('user_id', '=', $userId)->get();
        
        foreach ($data as $data) {

            $order = new Order;

            $order->name = $data->name;

            $order->email = $data->email;

            $order->phone = $data->phone;

            $order->address = $data->address;

            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;

            $order->price = $data->price;

            $order->quantity = $data->quantity;

            $order->image = $data->image;

            $order->product_id = $data->product_id;

            $order->payment_status = 'Đã thanh toán';

            $order->delivery_status = 'Đang xử lý';

            $order->save();

            // delete cart when chooser cash on delivery
            $cart_id = $data->id;

            $cart = Cart::find($cart_id);

            $cart->delete();
        }

        Session::flash('success', 'Payment Successfully!');

        return back();
    }

    // show order
    public function show_order()
    {
        if (Auth::id()) {
            $user = Auth::user();

            $userId = $user->id;

            $order = Order::where('user_id', '=', $userId)->get();


            return view('home.order', compact('order'));

        } else {
            return redirect('login');
        }
    }   

    // cancel order
    public function cancel_order($id)
    {
        $order = Order::find($id);

        $order->delivery_status = 'Đã huỷ';

        $order->save();

        return redirect()->back();
    }

    // product
    public function product() 
    {
        $product = Product::paginate(9);

        return view('home.all_product', compact('product'));
    }
}