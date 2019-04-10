<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table = "bills";

    public function BillDetail(){
      return this->hasMany("App\BillDetail",'id_bill','id');
    }

    public function BillDetail(){
      return this->belongsTo("App\Customer",'id_customer','id');
    }
}
