<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\MedicineTreatment;
use App\Models\Patient;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function dashboard() 
    {
        $patients = Patient::count();
        $doctors = Doctor::count();
        $treatment = Treatment::count();
        $medTreat = MedicineTreatment::sum('total');
       
        return view('dashboard', compact('patients','doctors', 'treatment','medTreat'));
    }

    public function index() 
    {
        $users = User::latest()->paginate(5);

        return view('users.index', compact('users'));
    }

    public function create() 
    {
        return view('users.create');
    }
    public function store(Request $request) 
    {
       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5','confirmed']
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'password.required' => 'password wajib diisi',

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        Alert::toast('Data berhasil ditambah', 'success');
        return redirect('/admin/users');
    }

    public function edit($id) 
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id) 
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password == null? $user->password : Hash::make($request->password),
        ]);

        Alert::toast('Data berhasil diubah', 'success');
        return redirect('/admin/users');
    }

    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        Alert::toast('Data berhasil dihapus', 'success');
        return redirect()->back();
    }
}
