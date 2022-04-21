<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Patient;
use App\Models\Medicine;
use App\Models\Treatment;
use Illuminate\Http\Request;
use App\Models\MedicineTreatment;
use RealRashid\SweetAlert\Facades\Alert;

class MedicineTreatmentController extends Controller
{
    public function index () 
    {
        $prescriptions = Treatment::has('medicineTreatment')
        ->with('medicineTreatment.medicine', 'patient','doctor')
        ->latest()
        ->paginate(10);


     
        return view('prescription.index', compact('prescriptions'));
    }

    public function create() 
    {
        $treatments = Treatment::with('patient')
        ->whereDate('created_at',  Carbon::today())->get();
        $medicines = Medicine::all();
      

        return view('prescription.create', compact('treatments', 'medicines'));
    }

    public function getData() 
    {
        $treatments = Treatment::with('patient')
        ->whereDate('created_at',  Carbon::today())->get();
        
        $medicines = Medicine::all();

        $data = [];

        $data = [
            'treatments' => $treatments,
            'medicines' => $medicines,
        ];


        return response()->json([
            'status' => 200,
            'data' => $data 
        ]);
    
    }

    // public function postData(Request $request) 
    // {
   
    //     // $data = MedicineTreatment::create([
    //     //     'treatment_id' => $request->treatment_id,
    //     //     'medicine_id' => $request->medicine_id,
    //     //     'amount' => $request->amount,

    //     // ]);
    //     $data = $request->medicine_id;
    //     return response()->json([
    //         'status' => $data,

    //     ]);
    
    // }

    public function store(Request $request) 
    {
        $medicine = $request->input('medicine');
        $treatment = $request->input('treatment');
        $amount = $request->input('amount');
        $number = count($medicine);
        
        for ($i=0; $i < $number; $i++) { 
            $data = MedicineTreatment::create([
                'treatment_id' => $treatment[$i],
                'medicine_id' => $medicine[$i],
                'amount' => $amount[$i],
                'total' => $amount[$i] * Medicine::find($medicine[$i])->price,

            ]);
        
            $sisaObat = Medicine::find($medicine[$i])->stock - $amount[$i];
            Medicine::find($medicine[$i])->update([
                'stock' => $sisaObat,
            ]);
        }

     
        Alert::toast('Data berhasil ditambah', 'success');
        return redirect()->route('prescription.index');
    }

    public function edit($id) 
    {
        $prescription = MedicineTreatment::find($id);
    
        return view('prescription.edit', compact('prescription'));
    }

    public function update(Request $request, $id) 
    {
        $prescription = MedicineTreatment::find($id);
        $prescription->update([
            'name' => $request->name,
            'unit' => $request->unit,
            'stock' => $request->stock,
            'price' => $request->price,
            'expired' => Carbon::parse($request->expired),
        ]);

        Alert::toast('Data berhasil diubah', 'success');
        return redirect('/admin/prescription');
    }

    public function delete($id)
    {
        
        $data = MedicineTreatment::where('treatment_id',$id)->get();
        foreach ($data as $key => $value) {
            $sisaObat = Medicine::find($value->medicine_id)->stock + $value->amount;
            Medicine::find($value->medicine_id)->update([
                'stock' => $sisaObat,
            ]);
        }
        MedicineTreatment::where('treatment_id',$id)->delete();
    
        
        Alert::toast('Data berhasil dihapus', 'success');
        return redirect()->back();
    }
}
