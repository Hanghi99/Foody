<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $table ="order_details";
    protected $fillable =[
        'id','quantity','price','food_id','user_id'
     ];
    public function order()
    {
    return $this->belongsTo(Orders::class,'order_id','id');
    }
    public function food()
    {
    return $this->belongsTo(Foods::class,'food_id','id');
    }
}
