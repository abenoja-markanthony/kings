<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyCollectionSummary extends Model
{
    protected $table= 'daily_col_sum';

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
