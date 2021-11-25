<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance_list extends Model
{
    protected $table= 'attendance_list';

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
