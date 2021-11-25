<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $table= 'Expenses';
    

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
