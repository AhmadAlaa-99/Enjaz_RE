<?php

namespace App\Models;
use App\Models\Units;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realty extends Model
{
    protected $table="realties";
    protected $guarded=[];

    use HasFactory;
    public function organization()
    {
        return $this->belongsTo(Organization::class,'owner_id','id');
    }
    /*
    public function units_tn()
    {
         return Units::where(['realty_id'=>'id','status'=>'rent'])->count();
    }
    public function units()
    {
           return $this->hasMany(Units::class);
    }
    */

}
