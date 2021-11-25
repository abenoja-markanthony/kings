<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreSaleAdmin extends Model
{
    protected $table= 'pre_sale_admin';

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
