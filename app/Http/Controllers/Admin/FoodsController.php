<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodsRequest;
use App\Models\Categories;
use App\Models\Foods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $foods = Foods::paginate(5);
        if($search )
        {
           $foods = DB::table('foods')->where('name','like','%'.$search.'%')->paginate(5); 
        }
        else{
            $foods = Foods ::orderBy('name','asc')->paginate(5); 
        }
       $params     = [
            'foods'=> $foods
        ];
        return view('admin.foods.index',$params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        $params     = [
            'categories'=> $categories
        ];
        return view('admin.foods.create',$params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodsRequest $request)
    {
        $data = $request->only('name','description','image','price','category_id');
        if ($request->hasFile('image')) {
            $get_image          = $request->image;
            //tạo file upload trong public để chạy ảnh
            $path               = 'admin/images/';
            $get_name_image     = $get_image->getClientOriginalName();//abc.jpg
            //explode "." [abc,jpg]
            //
            $name_image         = current(explode('.', $get_name_image));//trả về phần tử thứ 1 của mảng
            //getClientOriginalExtension: tạo đuôi ảnh
            $new_image          = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            //abc nối số ngẫu nhiên từ 0-99, nối "." ->đuôi file jpg
            $get_image->move($path, $new_image); //chuyển file ảnh tới thư mục
            $data['image']   = $new_image;
        }
        Foods::create($data);
        return redirect()->route('foods.index')->with('success','Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food= Foods::find($id);
        $params     = [
            'food'=> $food
        ];
        return view('admin.foods.show',$params); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::all();
        $food = Foods::find($id);
        $params= [
            "food" => $food,
            "categories" => $categories
        ];
        return view('admin.foods.edit',$params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FoodsRequest $request, $id)
    {
        $food = Foods::find($id);
        $new_image = $food->image;
        $data = $request->only('name','description','image','price','category_id');
        if ($request->hasFile('image')) {
            $get_image          = $request->image;
            //tạo file upload trong public để chạy ảnh
            $path               = 'admin/images/';
            $get_name_image     = $get_image->getClientOriginalName();//abc.jpg
            //explode "." [abc,jpg]
            //
            $name_image         = current(explode('.', $get_name_image));//trả về phần tử thứ 1 của mảng
            //getClientOriginalExtension: tạo đuôi ảnh
            $new_image          = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            //abc nối số ngẫu nhiên từ 0-99, nối "." ->đuôi file jpg
            $get_image->move($path, $new_image); //chuyển file ảnh tới thư mục
        }

        $food->name = $request->name;
        $food->description = $request->description;
        $food->image = $new_image;
        $food->price = $request->price;
        $food->category_id = $request->category_id;
        $food->save();

        return redirect()->route('foods.index')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Foods::find($id)->delete();
        return redirect()->route('foods.index')->with('success','Xoá thành công !');
    }
}
