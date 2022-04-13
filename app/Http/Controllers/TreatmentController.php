<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Treatment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TreatmentController extends Controller
{
    public function index () 
    {
      
        $treatment = Treatment::with('patient', 'doctor')
        ->latest()
        ->paginate(3);
       
        return view('treatment.index', compact('treatment'));
    }

    public function create() 
    {
        $doctors = Doctor::orderBy('name', 'asc')->get();
        $patients = Patient::orderBy('name', 'asc')->get();
       
        return view('treatment.create', compact('doctors', 'patients'));
    }


    public function store(Request $request) 
    {
       
        $request->validate([
            'patient_id' => ['required'],
            'doctor_id' => ['required'],
            'complaints' => ['required'],
            'diagnostic' => ['required'],
            'result' => ['required'],

        ],
        [
            'patient_id.required' => 'Nama Pasien wajib diisi',
            'doctor_id.required'  => 'Nama Dokter wajib diisi',
            'complaints.required' => 'Keluhan wajib diisi',
            'diagnostic.required' => 'Hasil Diagnosa wajib diisi',
            'result.required'     => 'Status wajib diisi',
        ]);
      
        $treatment = Treatment::create([
            'patient_id' => $request->patient_id,
            'doctor_id'  => $request->doctor_id,
            'complaints' => $request->complaints,
            'diagnostic' => $request->diagnostic,
            'result'     => $request->result,
        ]);
        
        Alert::toast('Data berhasil ditambah', 'success');
        return redirect('/admin/treatment');
    }


    public function edit($id) 
    {
        $treatment = Treatment::find($id);
        $doctors = Doctor::orderBy('name', 'asc')->get();
        $patients = Patient::orderBy('name', 'asc')->get();
    
        return view('treatment.edit', compact('treatment', 'doctors', 'patients'));
    }


    public function update(Request $request, $id) 
    {
        $treatment = Treatment::find($id);
        $treatment->update([
            'patient_id' => $request->patient_id == null? $treatment->patient->id : $request->patient_id,
            'doctor_id'  => $request->doctor_id == null? $treatment->doctor->id : $request->doctor_id,
            'complaints' => $request->complaints,
            'diagnostic' => $request->diagnostic,
            'result'     => $request->result,
        ]);

        Alert::toast('Data berhasil diubah', 'success');
        return redirect('/admin/treatment');
    }


    public function delete($id)
    {
        $data = Treatment::find($id);
        $data->delete();
        Alert::toast('Data berhasil dihapus', 'success');
        return redirect()->back();
    }
}
