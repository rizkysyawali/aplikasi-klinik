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

        <form method="POST" action="{{ route('doctors.update', $doctor->id) }}">
            @method('PUT')
            @csrf

            <div class="grid gap-6">
                <!-- Nama -->
                <div class="space-y-2">
                    <x-label for="name" :value="__('Nama')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="name" class="@error('name') is-invalid @enderror block w-full" type="text" name="name" value="{{$doctor->name}}"
                            required autofocus placeholder="{{ __('Name') }}" />
                    </x-input-with-icon-wrapper>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Spesialis -->
                <div class="space-y-2">
                    <x-label for="email" :value="__('Spesialis')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-icons.special aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="specialist" class="block w-full" type="text" name="specialist"
                            value="{{$doctor->specialist}}" required placeholder="{{ __('Spesialis') }}" />
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


