<x-app-layout>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Daftar List Resep Dokter') }}
            </h2>
        <a href="{{route('prescription.create')}}" type="button" class=" flex bg-purple-500 text-white hover:bg-purple-600 focus:ring-purple-500 px-2.5 py-1.5 text-sm rounded" >
                <x-icons.plus class="w-6 h-6" aria-hidden="true" />  
                <span>Tambah Data Resep</span>
            </a>
        </button>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-8">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Nama Pasien
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Nama Dokter
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Tanggal Berobat
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Jenis Obat
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Harga Satuan
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Jumlah
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Total Harga
                        </th>
                        
                        <th scope="col" class="px-6 py-3 text-center">
                            <span>Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prescriptions as $key => $prescription)
                            
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{$key+1}}
                            </th>
                            <td class="px-6 py-4 text-center">
                                {{$prescription->patient->name}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$prescription->doctor->name}}
                                
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$prescription->created_at->format('d/m/Y')}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                @foreach ($prescription->medicineTreatment as $medicine)
                                <p>- {{$medicine->medicine->name}}</p> 
                                @endforeach
                            
                            </td>
                            <td class="px-6 py-4 text-center">
                                @foreach ($prescription->medicineTreatment as $medicine)
                                <p> {{ "Rp " . number_format($medicine->medicine->price,0,',','.')}}</p> 
                                @endforeach
                             
                            </td>
                            <td class="px-6 py-4 text-center">
                                @foreach ($prescription->medicineTreatment as $medicine)
                                <p>- {{$medicine->amount}} {{$medicine->medicine->unit}}</p> 
                                @endforeach
                            </td>
                            <td class="px-6 py-4 text-center">
                            
                                <p> 
                                    {{ "Rp " . number_format($prescription->medicineTreatment->sum(function($medicine) {
                                        $total = $medicine->amount * $medicine->medicine->price;
                                        return $total;
                                    }),0,',','.')}}
                                </p> 
                            
                            </td>
                            <td class="px-6 py-4 text-center">
                                <form id="delete-form" action="{{ route('prescription.delete', $prescription->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg text-sm 2.5 text-center px-3 py-1.5 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" >
                                        <span>Hapus </span>
                                    </button>
                                 
                                </form>
                            </td>
                        </tr>                
                    @empty
                        <td colspan="8">
                            <h2 class="text-center text-sm dark:text-white py-5 font-bold">{{__('Data tidak ditemukan')}}</h2>
                        </td>
                    @endforelse

                 
                  
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="9">
                            <div class="px-4 my-10">
                                {!! $prescriptions->render() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>  
    
</x-app-layout>


