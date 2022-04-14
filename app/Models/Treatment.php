<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\MedicineTreatment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Treatment extends Model
{
    use HasFactory;

    protected $table ='treatments';

    protected $fillable = ['patient_id', 'doctor_id', 'complaints', 'diagnostic', 'result'];

    public function doctor() 
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient() 
    {
        return $this->belongsTo(Patient::class);
    }

    public function medicineTreatment() 
    {
        return $this->hasMany(MedicineTreatment::class);
    }
}
