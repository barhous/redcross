<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pcrs extends Model
{
    use HasFactory;
    
    protected $fillable=['identifier','ambulance_id','mission_id','patient_id'];
    
    public function cases(){
        return $this->hasMany(pcr_cases::class);
    }
    public function patient(){
        return $this->belongsTo(patient::Class);
    }
    public function ambulance(){
        return $this->belongsTo(ambulance::Class);
    }
    
    public function identifier(){
        
        
        

    }
}
