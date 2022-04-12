<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class PatientController extends Controller
{
    public function index () 
    {
        $patients = Patient::latest()->paginate(5);
        return view('patients.index', compact('patients'));
    }

    public function create() 
    {
        return view('patients.create');
    }
    public function store(Request $request) 
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required','string'],
            'age' => ['required'],
            'address' => ['required'],

        ],
        [
            'name.required' => 'Nama wajib diisi',
            'gender.required' => 'Jenis kelamin wajib diisi',
            'age.required' => 'Umur wajib diisi',
            'address.required' => 'Address wajib diisi',
        ]);
      
        $patient = Patient::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'address' => $request->address,
        ]);
        
        Alert::toast('Data berhasil ditambah', 'success');
        return redirect('/admin/patients');
    }

    public function edit($id) 
    {
        $patient = Patient::find($id);
    
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, $id) 
    {
        $patient = Patient::find($id);
        $patient->update([
            'name' => $request->name,
            'gander' => $request->gander,
            'age' => $request->age,
            'address' => $request->address,
        ]);

        Alert::toast('Data berhasil diubah', 'success');
        return redirect('/admin/patients');
    }

    public function delete($id)
    {
        $data = Patient::find($id);
        $data->delete();
        Alert::toast('Data berhasil dihapus', 'success');
        return redirect()->back();
    }
}
