<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 flex-row justify-center text-center">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Tambah Data Obat') }}
            </h2>
        </div>

    </x-slot>
     <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('medicines.store') }}">
            @csrf

            <div class="grid gap-6">
                <!-- Nama -->
                <div class="space-y-2">
                    <x-label for="name" :value="__('Nama')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                            </svg>
                        </x-slot>
                        <x-input withicon id="name" class="@error('name') is-invalid @enderror block w-full" type="text" name="name" :value="old('name')"
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
                        <legend>Satuan</legend>
                      
                        <div class="flex items-center mt-4">
                          <input required id="unit-option-1" type="radio" name="unit" value="Buah" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="unit-option-1" aria-describedby="unit-option-1" >
                          <label for="unit-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Buah
                          </label>
                        </div>
                      
                        <div class="flex items-center ml-5 mt-4 ">
                          <input unit id="unit-option-2" type="radio" name="unit" value="Botol" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="unit-option-2" aria-describedby="unit-option-2">
                          <label for="unit-option-2" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Botol
                          </label>
                        </div>
                        
                        <div class="flex items-center ml-5 mt-4 ">
                            <input unit id="unit-option-3" type="radio" name="unit" value="Strip" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="unit-option-3" aria-describedby="unit-option-3">
                            <label for="unit-option-3" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                              Strip
                            </label>
                        </div>

                        <div class="flex items-center ml-5 mt-4 ">
                            <input unit id="unit-option-4" type="radio" name="unit" value="Bungkus" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" aria-labelledby="unit-option-4" aria-describedby="unit-option-4">
                            <label for="unit-option-4" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                              Bungkus
                            </label>
                        </div>
                    </fieldset>
                </div>

                <!-- Umur -->
                <div class="space-y-2">
                    <x-label for="name" :value="__('Stok')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.588,3.411h-4.466c0.042-0.116,0.074-0.236,0.074-0.366c0-0.606-0.492-1.098-1.099-1.098H8.901c-0.607,0-1.098,0.492-1.098,1.098c0,0.13,0.033,0.25,0.074,0.366H3.41c-0.606,0-1.098,0.492-1.098,1.098c0,0.607,0.492,1.098,1.098,1.098h0.366V16.59c0,0.808,0.655,1.464,1.464,1.464h9.517c0.809,0,1.466-0.656,1.466-1.464V5.607h0.364c0.607,0,1.1-0.491,1.1-1.098C17.688,3.903,17.195,3.411,16.588,3.411z M8.901,2.679h2.196c0.202,0,0.366,0.164,0.366,0.366S11.3,3.411,11.098,3.411H8.901c-0.203,0-0.366-0.164-0.366-0.366S8.699,2.679,8.901,2.679z M15.491,16.59c0,0.405-0.329,0.731-0.733,0.731H5.241c-0.404,0-0.732-0.326-0.732-0.731V5.607h10.983V16.59z M16.588,4.875H3.41c-0.203,0-0.366-0.164-0.366-0.366S3.208,4.143,3.41,4.143h13.178c0.202,0,0.367,0.164,0.367,0.366S16.79,4.875,16.588,4.875zM6.705,14.027h6.589c0.202,0,0.366-0.164,0.366-0.366s-0.164-0.367-0.366-0.367H6.705c-0.203,0-0.366,0.165-0.366,0.367S6.502,14.027,6.705,14.027z M6.705,11.83h6.589c0.202,0,0.366-0.164,0.366-0.365c0-0.203-0.164-0.367-0.366-0.367H6.705c-0.203,0-0.366,0.164-0.366,0.367C6.339,11.666,6.502,11.83,6.705,11.83z M6.705,9.634h6.589c0.202,0,0.366-0.164,0.366-0.366c0-0.202-0.164-0.366-0.366-0.366H6.705c-0.203,0-0.366,0.164-0.366,0.366C6.339,9.47,6.502,9.634,6.705,9.634z"></path>
                            </svg>
                        </x-slot>
                        <x-input withicon id="stock" class="@error('stock') is-invalid @enderror block w-full" type="number" name="stock" :value="old('stock')"
                            required autofocus placeholder="{{ __('Stok') }}" />
                    </x-input-with-icon-wrapper>
                    @error('stock')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                 <!-- Harga -->
                 <div class="space-y-2">
                    <x-label for="name" :value="__('Harga Satuan')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.386,8.272c-0.239,0-0.432,0.194-0.432,0.432c0,0.239,0.193,0.433,0.432,0.433s0.432-0.193,0.432-0.433C4.818,8.466,4.625,8.272,4.386,8.272 M8.015,11.398l-0.191,0.823c0.236,0.063,0.961,0.314,1.068-0.15C9.005,11.587,8.25,11.461,8.015,11.398 M15.182,6.545H1.364C0.887,6.545,0.5,6.932,0.5,7.409v7.772c0,0.478,0.387,0.864,0.864,0.864h13.818c0.478,0,0.863-0.387,0.863-0.864V7.409C16.045,6.932,15.659,6.545,15.182,6.545M1.795,7.409c0.239,0,0.432,0.193,0.432,0.432c0,0.239-0.193,0.432-0.432,0.432S1.364,8.08,1.364,7.841C1.364,7.603,1.557,7.409,1.795,7.409 M1.795,15.182c-0.239,0-0.432-0.193-0.432-0.432s0.193-0.432,0.432-0.432s0.432,0.193,0.432,0.432S2.034,15.182,1.795,15.182 M14.75,15.182c-0.238,0-0.432-0.193-0.432-0.432s0.193-0.432,0.432-0.432s0.432,0.193,0.432,0.432S14.988,15.182,14.75,15.182 M15.182,13.534c-0.136-0.049-0.279-0.08-0.432-0.08c-0.715,0-1.296,0.581-1.296,1.296c0,0.152,0.031,0.296,0.08,0.432H3.012c0.048-0.136,0.079-0.279,0.079-0.432c0-0.715-0.58-1.296-1.295-1.296c-0.152,0-0.296,0.031-0.432,0.08V9.057c0.136,0.048,0.28,0.08,0.432,0.08c0.715,0,1.295-0.58,1.295-1.296c0-0.152-0.031-0.296-0.079-0.432h10.522c-0.049,0.136-0.08,0.28-0.08,0.432c0,0.716,0.581,1.296,1.296,1.296c0.152,0,0.296-0.031,0.432-0.08V13.534z M14.75,8.272c-0.238,0-0.432-0.193-0.432-0.432c0-0.238,0.193-0.432,0.432-0.432s0.432,0.193,0.432,0.432C15.182,8.08,14.988,8.272,14.75,8.272 M18.637,3.955H4.818c-0.477,0-0.864,0.387-0.864,0.864V5.25c0,0.239,0.193,0.432,0.432,0.432S4.818,5.489,4.818,5.25V4.818h13.818v7.772h-1.296c-0.239,0-0.432,0.193-0.432,0.432c0,0.239,0.192,0.432,0.432,0.432h1.296c0.477,0,0.863-0.386,0.863-0.863V4.818C19.5,4.341,19.113,3.955,18.637,3.955 M8.275,10.274l-0.173,0.748C8.298,11.073,8.902,11.289,9,10.866C9.102,10.425,8.471,10.327,8.275,10.274 M12.159,13.454c-0.239,0-0.432,0.194-0.432,0.433s0.192,0.432,0.432,0.432c0.238,0,0.432-0.193,0.432-0.432S12.397,13.454,12.159,13.454 M8.272,8.272c-1.669,0-3.022,1.354-3.022,3.023s1.354,3.022,3.022,3.022c1.67,0,3.023-1.353,3.023-3.022S9.942,8.272,8.272,8.272 M9.685,10.872c-0.045,0.332-0.216,0.493-0.443,0.55c0.311,0.175,0.47,0.442,0.319,0.907c-0.188,0.577-0.632,0.625-1.224,0.505l-0.144,0.62l-0.347-0.093l0.142-0.612c-0.09-0.024-0.183-0.05-0.276-0.077l-0.143,0.615l-0.346-0.094l0.143-0.621c-0.081-0.022-0.163-0.047-0.247-0.069l-0.451-0.121l0.172-0.429c0,0,0.256,0.073,0.252,0.068c0.098,0.026,0.142-0.043,0.159-0.089l0.227-0.98c0.013,0.003,0.024,0.006,0.036,0.009c-0.014-0.006-0.026-0.009-0.036-0.012l0.162-0.701c0.004-0.079-0.021-0.179-0.162-0.217c0.005-0.004-0.252-0.067-0.252-0.067l0.092-0.399l0.479,0.128L7.797,9.694c0.072,0.02,0.146,0.039,0.222,0.057l0.143-0.614l0.346,0.093L8.368,9.833c0.094,0.023,0.187,0.046,0.278,0.07l0.138-0.599l0.347,0.094L8.99,10.012C9.427,10.174,9.748,10.419,9.685,10.872"></path>
                            </svg>
                        </x-slot>
                        <x-input withicon id="price" class="@error('price') is-invalid @enderror block w-full" type="number" name="price" :value="old('price')"
                            required autofocus placeholder="{{ __('Harga Satuan') }}" />
                    </x-input-with-icon-wrapper>
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Harga -->
                <div class="space-y-2">
                    <x-label for="name" :value="__('Tanggal Expire')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                          <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        </x-slot>
                        <x-input datepicker datepicker-autohide withicon id="expired" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="expired" :value="old('expired')"
                            required placeholder="{{ __('Pilih Tanggal') }}" />
                    </x-input-with-icon-wrapper>
                    @error('expired')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>


                <div>
                    <x-button class="justify-center w-full gap-2 my-5">
                        <x-heroicon-o-user-add class="w-6 h-6" aria-hidden="true" />
                        <span>{{ __('Simpan') }}</span>
                    </x-button>
                </div>
            </div>
        </form>
    </x-auth-card>

</x-app-layout>


