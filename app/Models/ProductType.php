<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = "type_products";

    public function product(){
        return $this->hasMany('App\Model\Product', 'id_type', 'id'); //đường dẫn đến model, khóa ngoại của bảng loại sp vs sp, khóa chsính ip bảng loại sp
        
    }
}
