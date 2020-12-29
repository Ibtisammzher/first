<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table='projects';
    protected $guarded=[];


    public function service()
    {
        return $this->hasMany(project::class);
        
    }  
}
