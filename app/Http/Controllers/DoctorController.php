<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DoctorController extends Controller
{
    public function index () 
    {
        $doctors = Doctor::latest()->paginate(5);

        return view('doctors.index', compact('doctors'));
    }


    public function create() 
    {
        return view('doctors.create');
    }
    public function store(Request $request) 
    {
       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'specialist' => ['required'],
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'specialist.required' => 'Spesialis wajib diisi',
    

        ]);

        $doctor = Doctor::create([
            'name' => $request->name,
            'specialist' => $request->specialist,
        ]);
        
        Alert::toast('Data berhasil ditambah', 'success');
        return redirect('/admin/doctors');
    }

    public function edit($id) 
    {
        $doctor = doctor::find($id);

        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, $id) 
    {
        $doctor = Doctor::find($id);
        $doctor->update([
            'name' => $request->name,
            'specialist' => $request->specialist,
        ]);

        Alert::toast('Data berhasil diubah', 'success');
        return redirect('/admin/doctors');
    }

    public function delete($id)
    {
        $data = Doctor::find($id);
        $data->delete();
        Alert::toast('Data berhasil dihapus', 'success');
        return redirect()->back();
    }
}
