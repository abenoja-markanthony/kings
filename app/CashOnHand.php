<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashOnHand extends Model
{
    protected $table= 'cash_on_hands';
    

    public $primaryKey= 'id';

    protected $guarded=[];
    
    public function scopeActive($query)
    {
        $query->where('status','1');
    }

    public function scopeInactive($query)
    {
        $query->where('status','!=','1');
    }
}
