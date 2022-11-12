<?php

namespace App\Models;
use App\Models\Lease;
use App\Models\Realty;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class organization extends Model
{
    use HasFactory;
    protected $table="organization";
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class,'email','email');
    }
    public function realties()
    {
        return $this->hasMany(Realty::class,'owner_id','id');
    }
    public function leases()
    {
        return $this->hasMany(Lease::class,'org_id','id');
    }

}
