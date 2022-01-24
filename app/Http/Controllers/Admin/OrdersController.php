<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        if($search )
        {
           $orders = Orders::where('user_id','like','%'.$search.'%')->paginate(3); 
        }
        else{
            $orders = Orders::orderBy('user_id','asc')->paginate(3); 
        }
        $params =[
            'orders'=>$orders
        ];
       return view('admin.orders.index',$params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $params = [
            'users' => $users
        ];
        return view('admin.orders.create',$params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Orders::create($request->only('code','status','user_id'));
        return redirect()->route('orders.index')->with('success','Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Orders::find($id);

        // dd($order->order_details);
        
        $params = [
            'order'=>$order
        ];
        return view('admin.orders.show',$params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $order = Orders::find($id);
      // in dữ liệu ra blade
      $params     = [
        'order'=>$order,
        'users'=>$users
      ];
      return view('admin.orders.edit',$params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      Orders::find($id)->update($request->only('code','status','user_id'));
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Orders::find($id)->delete();
        return redirect()->route('orders.index')->with('success','Xoá thành công !');
    }
}
