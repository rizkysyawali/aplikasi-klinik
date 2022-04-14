<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'unit', 'stock', 'price', 'expired'];

    public function medicineTreatment() 
    {
        return $this->hasMany(MedicineTreatment::class);
    }
}
