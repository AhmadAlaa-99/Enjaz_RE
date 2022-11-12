<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tenant;
use App\Models\organization;
use App\Models\Units;


class Lease extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function tenants()
    {
        return $this->belongsTo(Tenant::class,'tenant_id');
    }

    public function organization()
    {
        return $this->belongsTo(organization::class,'org_id');
    }

    public function units()
    {
        return $this->belongsTo(Units::class,'unit_id','id');
    }

    public function realties()
    {
        return $this->belongsTo(Realty::class,'realty_id');
    }
    public function Commitments()
    {
        return $this->belongsTo('App\Models\Commitments','lease_id','commitments_id');
    }
    public function payments()
    {
        return $this->belongsTo('App\Models\Payments','lease_id','payments_id');
    }
    public function financial()
    {
        return $this->belongsTo('App\Models\Financial_statements','financial_id');
    }

}
