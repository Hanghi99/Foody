<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table ="orders";
    protected $fillable = [
        'id','code','status','user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class ,'user_id','id');
    }

    public function order_details(){
        return $this->hasMany(Order_detail::class,'order_id','id');
    }
}
