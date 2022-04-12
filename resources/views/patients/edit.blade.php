<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 flex-row justify-center text-center">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Update Data Admin') }}
            </h2>
        </div>

    </x-slot>
     <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('patients.update', $patient->id) }}">
            @method('PUT')
            @csrf

            <div class="grid gap-6">
                <!-- Nama -->
                <div class="space-y-2">
                    <x-label for="name" :value="__('Nama')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                           
                        </x-slot>
                        <x-input withicon id="name" class="@error('name') is-invalid @enderror block w-full" type="text" name="name" :value="$patient->name"
                            required autofocus placeholder="{{ __('Name') }}" />
                    </x-input-with-icon-wrapper>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Jenis Kelamin -->
                <div class="space-y-2">
                    <fieldset class="flex">
                        <legend>Jenis Kelamin</legend>
                      
                        <div class="flex items-center mt-4">
                          <input required id="gender-option-1" type="radio" name="gender" value="Laki-Laki" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="gender-option-1" aria-describedby="gender-option-1" {{$patient->gender == 'Laki-Laki' ?'checked':''}} >
                          <label for="gender-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Laki-Laki
                          </label>
                        </div>
                      
                        <div class="flex items-center ml-5 mt-4 ">
                          <input gender id="gender-option-2" type="radio" name="gender" value="Perempuan" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="gender-option-2" aria-describedby="gender-option-2" {{$patient->gender == 'Perempuan' ?'checked':''}}>
                          <label for="gender-option-2" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Perempuan
                          </label>
                        </div>
                    </fieldset>
                </div>

                <!-- Umur -->
                <div class="space-y-2">
                    <x-label for="name" :value="__('Umur')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            
                        </x-slot>
                        <x-input withicon id="age" class="@error('age') is-invalid @enderror block w-full" type="number" name="age" :value="$patient->age"
                            required autofocus placeholder="{{ __('Umur') }}" />
                    </x-input-with-icon-wrapper>
                    @error('age')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                 <!-- Umur -->
                 <div class="space-y-2">
                    <x-label for="address" :value="__('Alamat')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                        </x-slot>
                        <x-textarea style="resize:none" class="@error('address') is-invalid @enderror block w-full" type="text" name="address" :value="$patient->address"
                    required autofocus placeholder=""/>
                        
                    </x-input-with-icon-wrapper>
                    @error('age')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
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


