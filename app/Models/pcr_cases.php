<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pcr_cases extends Model
{
    use HasFactory;
    protected $fillable=['pcr_id','case_id'];
   
}
