<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 flex-row justify-center text-center">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Tambah Data Pasien') }}
            </h2>
        </div>

    </x-slot>
     <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('treatment.store') }}">
            @csrf

            <div class="grid gap-6">
                <!-- Nama Pasien -->
                <div class="space-y-2">
                    <x-label for="name" :value="__('Nama Pasien')" />
                    <div class="flex justify-start">
                        <div class="mb-3 w-full ">
                            <select name="patient_id" class="form-select
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
                            aria-label="Default select example" required autofocus>
                                <option disabled selected>--Pilih Pasien--</option>
                                @foreach ($patients as $patient)
                                    <option value="{{$patient->id}}" {{old('patient_id') == $patient->id ?' selected ': ''}}>{{$patient->name}}</option>
                                @endforeach
                              
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Nama Dokter -->
                <div class="space-y-2">
                    <x-label for="name" :value="__('Nama Dokter')" />
                    <div class="flex justify-start">
                        <div class="mb-3 w-full ">
                            <select name="doctor_id" class="form-select
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
                                <option disabled selected>--Pilih Dokter--</option>
                                @foreach ($doctors as $doctor)
                                    <option value="{{$doctor->id}}" {{old('doctor_id') == $doctor->id ? 'selected' : ''}}>{{$doctor->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                 <!-- Keluhan -->
                 <div class="space-y-2">
                    <x-label for="complaints" :value="__('Keluhan')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                        </x-slot>
                        <x-textarea style="resize:none" class="@error('complaints') is-invalid @enderror block w-full" type="text" name="complaints" :value="old('complaints')"
                            required autofocus placeholder="{{ __('Keluhan') }}" /> 
                        
                    </x-input-with-icon-wrapper>
                </div>

                
                 <!-- Hasil Diagnosa -->
                 <div class="space-y-2">
                    <x-label for="diagnostic" :value="__('Hasil Diagnosa')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                        </x-slot>
                        <x-textarea style="resize:none" class="@error('diagnostic') is-invalid @enderror block w-full" type="text" name="diagnostic" :value="old('diagnostic')"
                            required autofocus placeholder="{{ __('Hasil Diagnosa') }}" /> 
                        
                    </x-input-with-icon-wrapper>
                </div>

                
                 <!-- Hasil Diagnosa -->
                 <div class="space-y-2">
                    <x-label for="result" :value="__('Status')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                        </x-slot>
                        <x-textarea style="resize:none" class="@error('result') is-invalid @enderror block w-full" type="text" name="result" :value="old('result')"
                            required autofocus placeholder="{{ __('Status') }}" /> 
                        
                    </x-input-with-icon-wrapper>
                </div>


                <div>
                    <x-button class="justify-center w-full gap-2">
                        <x-heroicon-o-user-add class="w-6 h-6" aria-hidden="true" />
                        <span>{{ __('Simpan') }}</span>
                    </x-button>
                </div>
            </div>
        </form>
    </x-auth-card>

</x-app-layout>


