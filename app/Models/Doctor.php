<?php

namespace App\Models;

use App\Models\Treatment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'specialist'];

    public function treatment() 
    {
        $this->hasMany(Treatment::class);
    }
}
