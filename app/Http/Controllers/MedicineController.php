<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Medicine;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MedicineController extends Controller
{
    public function index () 
    {
        $medicines = Medicine::latest()->paginate(10);
        return view('medicines.index', compact('medicines'));
    }

    public function create() 
    {
        return view('medicines.create');
    }
    public function store(Request $request) 
    {
       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'unit' => ['required','string'],
            'stock' => ['required'],
            'price' => ['required'],
            'expired' => ['required'],
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'unit.required' => 'Satuan wajib diisi',
            'stock.required' => 'Stok wajib diisi',
            'price.required' => 'Harga wajib diisi',
            'expired.required' => 'Expire wajib diisi',

        ]);
      
        $medicine = Medicine::create([
            'name' => $request->name,
            'unit' => $request->unit,
            'stock' => $request->stock,
            'price' => $request->price,
            'expired' => Carbon::parse($request->expired),
        ]);
        
        Alert::toast('Data berhasil ditambah', 'success');
        return redirect('/admin/medicines');
    }

    public function edit($id) 
    {
        $medicine = Medicine::find($id);
    
        return view('medicines.edit', compact('medicine'));
    }

    public function update(Request $request, $id) 
    {
        $medicine = Medicine::find($id);
        $medicine->update([
            'name' => $request->name,
            'unit' => $request->unit,
            'stock' => $request->stock,
            'price' => $request->price,
            'expired' => Carbon::parse($request->expired),
        ]);

        Alert::toast('Data berhasil diubah', 'success');
        return redirect('/admin/medicines');
    }

    public function delete($id)
    {
        $data = Medicine::find($id);
        $data->delete();
        Alert::toast('Data berhasil dihapus', 'success');
        return redirect()->back();
    }
}
