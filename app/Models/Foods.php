<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    use HasFactory;
    protected $table ="foods";
    protected $fillable =[
        'id','name','description','image','price','category_id'
     ];
    public function categories()
    {
    return $this->belongsTo(Categories::class,'category_id','id');
    }
    public function order_detail()
    {
    return $this->belongsToMany(Order_detail::class);
    }
}
