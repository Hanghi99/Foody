<?php

namespace App\Http\Controllers\client;

use App\Models\Categories;
use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Foods;
use App\Models\Order_detail;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    { 
        $user = Auth::user();
        // echo '<pre>';
        // print_r ($user);
        // echo '</pre>';

        $foods = Foods::all();
        $Categories = Categories::all();
        $params     = [
            "foods" => $foods,
            "Categories" => $Categories
        ];
     return view('client.home.index',$params);
    }//
    public function categories($id)
    {
        $CategoriesCurrent = DB::table('foods')->where("category_id",$id)->get();
        $Categories = Categories::all();
        $params = ['CategoriesCurrent'  =>  $CategoriesCurrent,
                    "Categories"        =>  $Categories ];
        // echo "<pre>";
        // print_r($Categories);
        // echo "</pre>";
        return view('client.home.categories',$params);
    }
    public function addToCart(Request $request,$id)
    {
        $food = Foods::find($id);
        $carts = new Carts() ;
        $carts->food_id = $food->id;
        $carts->quantity = 1;
        $carts->price = $food->price;
        $carts->save();

   return redirect()->route('cart');
    }
    public function cart()
    {
        $Categories = Categories::all();
        $Carts = DB::table('carts')
        ->join('foods', 'foods.id', '=', 'carts.food_id')
        ->select('carts.*', 'foods.image','foods.name',DB::raw('(carts.price * carts.quantity) as totalPrice'))
        ->get();
        $params = [ 
                    "Categories"    =>  $Categories,
                    "Carts"         =>  $Carts 
                  ];
        // echo "<pre>";
        // print_r($Carts);
        // echo "</pre>";
        // die();
        return view('client.home.cart',$params);
    }
    public function fixCartUser(Request $request,$id)
   {
      $cart = Carts::find($id);
      $cart->quantity  = $request->quantity;
      $cart->save();
      Session::flash('success','thay ?????i th??nh c??ng');
      return redirect()->back();
   }
   public function delelteCartUser($id)
   {
      $cart = Carts::find($id);
      $cart->delete();
      Session::flash('success','x??a th??nh c??ng');
      return redirect()->back();
   }
   public function checkout()
   {
    $user = Auth::user();
    $Categories = Categories::all();
    $Carts = DB::table('carts')
    ->join('foods', 'foods.id', '=', 'carts.food_id')
    ->select('carts.*', 'foods.image','foods.name',DB::raw('(carts.price * carts.quantity) as totalPrice'))
    ->get();
    $totalQuantity =   DB::table('carts')
    ->select( DB::raw('sum(carts.quantity) as totalQuantity'))
    ->first();
$totalPrice =   DB::table('carts')
    ->select(DB::raw('sum(carts.price * carts.quantity) as totalPrice'))
    ->first();
    // dd( $totalPrice);
    $params = [ 
                "Categories"    =>  $Categories,
                "Carts"         =>  $Carts ,
                "totalPrice"    =>  $totalPrice,
                "totalQuantity" => $totalQuantity
              ];
    // echo "<pre>";
    // print_r($Carts);
    // echo "</pre>";
    // die();
    return view('client.home.checkout',$params);
   
    
   }
   public function pay(Request $request)
    {
        $totalQuantity =   DB::table('carts')
        ->select( DB::raw('sum(carts.quantity) as totalQuantity'))
        
        ->groupBy('carts.food_id')
        ->first();
    $totalPrice =   DB::table('carts')
        ->select(DB::raw('sum(carts.price * carts.quantity) as totalPrice'))
        
        ->groupBy('carts.food_id')
        ->first();
        $Carts = DB::table('carts')
        ->join('foods', 'foods.id', '=', 'carts.food_id')
        ->select('carts.*', 'foods.image','foods.name',DB::raw('(carts.price * carts.quantity) as totalPrice'))
        ->get();
        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'address'   => 'required',
            'birthday'  => 'required',
            'gender'    => 'required',
            'password'  => 'required',
        ],
        [
            'name.required'     => "Vui l??ng nh???p t??n ng?????i d??ng",
            'email.required'    => "Vui l??ng nh???p email ng?????i d??ng",
            'address.required'  => "Vui l??ng nh???p ?????a ch??? ng?????i d??ng",
            'birthday.required' => "Vui l??ng nh???p ng??y sinh ng?????i d??ng",
            'gender.required'   => "Vui l??ng nh???p gi???i t??nh ng?????i d??ng",
            'password.required' => "Vui l??ng nh???p m???t kh???u  ng?????i d??ng",
        ]);
        // dd($cart);

        // foreach ($cart->items as $item){
        //     dd($item['item']);
        // }
        $totalPrice =   DB::table('carts')
        ->select(DB::raw('sum(carts.price * carts.quantity) as totalPrice'))
        
        ->groupBy('carts.food_id')
        ->first();
        $user_id = $this->checkUserExist($request->email);

        if (!$user_id) {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->birthday = $request->input('birthday');
            $user->gender = $request->input('gender');
            $user->level = 'Kh??ch h??ng';
            $user->password = $request->input('password');
            $user->save();
            $user_id = $user->id;
        }

        //Th??m d??? li???u v??o b???ng Orders
        $order = new Orders();
        $order->user_id = $user_id;
        $order->totalPrice = $totalPrice->totalPrice;
        $order->status = '??ang x??? l??';
        $order->code = time();
        $order->save();
        $order_id = DB::getPdo()->lastInsertId();

        //L??u v??o b???ng chi ti???t ????n h??ng
        foreach( $Carts as $key => $cart )
        {
         $order_details             = new Order_detail();
         $order_details->food_id    = $cart->food_id;
         $order_details->price      = $cart->price;
         $order_details->order_id   = $order_id;
         $order_details->quantity   = $cart->quantity;
         $order_details->save();
         }
     // Chuy???n h?????ng sang trang th??nh c??ng

     
    return redirect()->route('home.index')->with('success','Thanh to??n th??nh c??ng, c???m ??n b???n ???? gh?? th??m c???a h??ng');;
    }
    public function checkUserExist($email){
        $user = DB::table('users')->where('email','=',$email)->first();
        if ($user){ 
            return $user->id;
        }else {
            return 0;
        }
    }








}
