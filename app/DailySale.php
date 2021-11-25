<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailySale extends Model
{
    protected $table= 'daily_sales';

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
