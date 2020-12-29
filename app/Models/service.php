<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;
    protected $table='services';
    protected $guarded=[];


    public function projects()
    {
        return $this->belongsT(service::class);

       

       
    }
}
