<?php

namespace App\Http\Controllers;

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
      
        ->paginate(5);

        $patients = Patient::whereHas('treatment.medicineTreatment.medicine')
        ->with('treatment.medicineTreatment.medicine', 'treatment.doctor')
        ->paginate(5);
     
        return view('prescription.index', compact('prescriptions', 'patients'));
    }

    public function create() 
    {
        $treatments = Treatment::all();
        $medicines = Medicine::all();
    

        return view('prescription.create', compact('treatments', 'medicines'));
    }

    public function getData() 
    {
        $treatments = Treatment::all();
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
        
        // $medicine = collect($request->input('medicine', []))
        // ->map(function($medicine){
        //     return ['medicine_id', $medicine];
        // });

        // $treatment = collect($request->input('treatment', []))
        // ->map(function($treatment){
        //     return ['treatment_id', $treatment];
        // });
        //     if ($number >1) {
        //         for ($i=0; $i < $number ; $i++) { 
        //             if (trim($medicine[$i] != '')) {
        //                 MedicineTreatment::create([
        //                     'medicine_id' => $medicine[$i],
        //                     'treatment_id' => $treatment[$i],
        //                     'amount' => $amount[$i],
        //                 ]);
        //             }
        //         }
        //     } else {
        //         MedicineTreatment::create([
        //             'medicine_id' => $medicine,
        //             'treatment_id' => $treatment,
        //             'amount' => $amount,
        // ]);
        //     }
  

        // $amount = collect($request->input('amount', []))
        // ->map(function($amount){
        //     return ['amount', $amount];
        // });
       
        // $prescription = MedicineTreatment::create([
        //     'medicine_id' => $request->medicine,
        //     'treatment_id' => $request->treatment,
        //     'amount' => $request->amount,
        // ]);
        // dd($prescription );
            // $medicine = Medicine::whereIn('id', '');
        
    for ($i = 0; $i < $number; $i++) {
        $prescription[] = [
            'medicine_id' => $request->medicine[$i],
            'treatment_id' => $request->treatment[$i],
            'amount' => $request->amount[$i],
            'total' => 50000 
        ];
    }
    MedicineTreatment::insert($prescription);
        Alert::toast('Data berhasil ditambah', 'success');
        return redirect('/admin/prescription');
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
        $data = Medicine::find($id);
        $data->delete();
        Alert::toast('Data berhasil dihapus', 'success');
        return redirect()->back();
    }
}
