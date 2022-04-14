<?php

namespace App\Models;

use App\Models\Medicine;
use App\Models\Treatment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicineTreatment extends Model
{
    use HasFactory;

    protected $table ='medicine_treatments';

    protected $fillable = ['medicine_id', 'treatment_id', 'amount', 'total'];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }

    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }
}
