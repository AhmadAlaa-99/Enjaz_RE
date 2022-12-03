<?php
namespace App\Models;
use App\Models\Units;
use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realty extends Model
{
    protected $table="realties";
    protected $guarded=[];

    use HasFactory;

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
      public function owner()
    {
        return $this->belongsTo(Owner::class,'owner_id','id');
    }

}
