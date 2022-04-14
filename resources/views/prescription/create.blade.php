<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 flex-row justify-center text-center">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Tambah Resep Dokter') }}
            </h2>
        </div>

    </x-slot>
     <x-authcard>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form action="" method="post"></form>
     <form action="{{route('prescription.store')}}" method="POST">
        @csrf
            <div id="form-submit">
                <div class="grid gap-8 p-4 sm:grid-cols-2 md:grid-cols-4" >
                    <!-- Id Berobat -->
                    <div class="space-y-2">
                        <x-label for="name" :value="__('ID data Berobat')" />
                        <div class="flex justify-start">
                            <div class="mb-3 w-full ">
                                <select id="treatment" name="treatment[]" class="treatment form-select
                                w-full
                                text-base
                                font-normal
                                dark:text-white-700
                                dark:focus:ring-gray-600 dark:focus:bg-gray-600 dark:bg-gray-700 dark:border-gray-600
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-white-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                                aria-label="Default select example" required>
                                    <option disabled selected>--Pilih--</option>
                                    @foreach ($treatments as $treatment)
                                        <option value="{{$treatment->id}}">{{$treatment->id}}</option>
                                    @endforeach
                                  
                                </select>
                            </div>
                        </div>
                    </div>
    
                    <!-- Nama Obat -->
                    <div class="space-y-2">
                        <x-label for="name" :value="__('Nama Obat')" />
                        <div class="flex justify-start">
                            <div class="mb-3 w-full ">
                                <select id="medicine" name="medicine[]" class="medicine form-select
                                w-full
                                text-base
                                font-normal
                                dark:text-white-700
                                dark:focus:ring-gray-600 dark:focus:bg-gray-600 dark:bg-gray-700 dark:border-gray-600
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-white-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                                aria-label="Default select example" required >
                                    <option disabled selected>--Pilih-</option>
                                    @foreach ($medicines as $medicine)
                                        <option value="{{$medicine->id}}">{{$medicine->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
    
                     <!-- Keluhan -->
                     <div class="space-y-2">
                        <x-label for="amount" :value="__('Jumlah')" />
                        <x-input-with-icon-wrapper>
                            <x-slot name="icon">
                            </x-slot>
                            <x-input style="resize:none" class="camount block w-full" type="number" name="amount[]" :value="old('amount')"
                               required placeholder="{{ __('Jumlah') }}" /> 
                            
                        </x-input-with-icon-wrapper>
                    </div>
                    <div class="mt-8">
                        <x-button id="addd" href="#" class="justify-center w-full gap-2 bg-purple-500 text-white hover:bg-purple-600 focus:ring-purple-500 px-4 py-2 text-base rounded-md">
                            <span>{{ __('Tambah Obat') }}</span>
                        </x-button>
                    </div>
                </div>
            </div>
            
            
            <div class="mt-8">
                <x-button class="justify-center w-full gap-2">
                    <x-heroicon-o-user-add class="w-6 h-6" aria-hidden="true" />
                    <span>{{ __('Simpan') }}</span>
                </x-button>
            </div>
        </form>
    </x-authcard>

</x-app-layout>

{{-- <div id="row'+i+'" class="grid gap-8 p-4 sm:grid-cols-2 md:grid-cols-4"><div class="space-y-2"><x-label for="name" value="Data Berobat" /><div class="flex justify-start"><div class="mb-3 w-full "><select name="treatment" class="form-select w-full text-base font-normal dark:text-white-700 dark:focus:ring-gray-600 dark:focus:bg-gray-600 dark:bg-gray-700 dark:border-gray-600 border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-white-700 focus:bg-white focus:border-blue-600 focus:outline-none"  aria-label="Default select example" required autofocus><option disabled selected>--Pilih Id Berobat--</option><option value="A">A</option></select></div></div></div><div class="space-y-2"><x-label for="name" value="Nama Obat" /><div class="flex justify-start"><div class="mb-3 w-full "><select name="medicine[]" class="form-select w-full text-base font-normal dark:text-white-700 dark:focus:ring-gray-600 dark:focus:bg-gray-600 dark:bg-gray-700 dark:border-gray-600 border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-white-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" required ><option disabled selected>--Pilih Obat--</option><option value="B">B</option></select></div></div></div><div class="space-y-2"><x-label for="amount" value="__("Jumlah")" /><x-input-with-icon-wrapper><x-slot name="icon"></x-slot><x-input style="resize:none" class="block w-full" type="number" name="amount[]" value="old("amount")"required placeholder="{{ __("Jumlah") }}" /></x-input-with-icon-wrapper></div><div class="mt-8"><x-button id="addd" href="#" class="justify-center w-full gap-2 bg-purple-500 text-white hover:bg-purple-600 focus:ring-purple-500 px-4 py-2 text-base rounded-md"><span>{{ __("Tambah Obat") }}</span></x-button></div></div> --}}