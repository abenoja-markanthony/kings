<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalExpRec extends Model
{
    protected $table= 'additional_exp_recs';

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
