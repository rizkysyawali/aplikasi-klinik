<x-app-layout>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Daftar') }}
            </h2>
        <a href="{{route('treatment.create')}}" type="button" class=" flex bg-purple-500 text-white hover:bg-purple-600 focus:ring-purple-500 px-2.5 py-1.5 text-sm rounded" >
                <x-icons.plus class="w-6 h-6" aria-hidden="true" />  
                <span>Tambah Data</span>
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
                            Keluhan Pasien
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Hasil diagnosa
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <span>Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($treatment as $key => $treat)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="text-center px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{$key+1}}
                            </th>
                            <td class="px-6 py-4 text-center">
                                {{$treat->patient->name}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$treat->doctor->name}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$treat->created_at->format('d-m-Y')}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$treat->complaints}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$treat->diagnostic}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{$treat->result}}
                            </td>
                            <td class="px-6 py-4 text-center">
                            <a href="{{route('treatment.edit', $treat->id)}}" type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                                    <span>Edit</span>
                                </a>
                                <a href="{{ route('treatment.delete', $treat->id ) }}" onclick="event.preventDefault();
                                document.getElementById('delete-form').submit();"
                                type="button" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg text-sm 2.5 text-center px-3 py-1.5 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900" data-modal-toggle="defaultModal">
                                    <span>Hapus</span>
                                </a>
                            </td>
                            <form id="delete-form" action="{{ route('treatment.delete', $treat->id) }}" method="POST" style="display: none;">
                                @method('delete')
                                @csrf
                            </form>
                        </tr>                
                    @empty
                    <td colspan="8">
                        <h2 class="text-center text-sm dark:text-white py-5 font-bold">{{__('Data tidak ditemukan')}}</h2>
                    </td>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8">
                            <div class="px-4 my-10">
                                {!! $treatment->render() !!}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>  
    
</x-app-layout>


