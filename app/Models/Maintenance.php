<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function units()
    {
        return $this->belongsTo(App\Models\Units::class,'unit_id');
    }
}
