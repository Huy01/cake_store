<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bill extends Model
{
    protected $table = "bills";

    public function bill_detail(){
        return $this->HasMany('App\Models\BillDetail','id_bill', 'id' );
    }

    public function bill(){
        return $this->belongsTo('App\Models\Customer', 'id_bill', 'id');
    }

    
}
