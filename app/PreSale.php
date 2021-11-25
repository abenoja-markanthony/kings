<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreSale extends Model
{
    protected $table= 'pre_sales';

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
