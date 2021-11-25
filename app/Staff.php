<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table= 'staffs';

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
