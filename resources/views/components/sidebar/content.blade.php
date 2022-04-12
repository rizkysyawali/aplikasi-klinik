<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    {{-- <x-sidebar.dropdown title="Buttons" :active="Str::startsWith(request()->route()->uri(), 'buttons')">
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="Text button" href="{{ route('buttons.text') }}"
            :active="request()->routeIs('buttons.text')" />
        <x-sidebar.sublink title="Icon button" href="{{ route('buttons.icon') }}"
            :active="request()->routeIs('buttons.icon')" />
        <x-sidebar.sublink title="Text with icon" href="{{ route('buttons.text-icon') }}"
            :active="request()->routeIs('buttons.text-icon')" />
    </x-sidebar.dropdown> --}}

    <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-sm text-gray-500">Data</div>   
        <x-sidebar.link title="User" href="{{ route('users.index') }}" :isActive="request()->routeIs('users.index') || request()->routeIs('users.create') || request()->routeIs('users.edit')" />
        <x-sidebar.link title="Dokter" href="{{ route('doctors.index') }} " :isActive="request()->routeIs('doctors.index') || request()->routeIs('doctors.create') || request()->routeIs('doctors.edit')" >
            <x-slot name="icon">
                <x-icons.docter class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            </x-slot>
        </x-sidebar.link>
        <x-sidebar.link-patient title="Pasien" href="{{ route('patients.index') }}" :isActive="request()->routeIs('patients.index') || request()->routeIs('patients.create') || request()->routeIs('patients.edit')" >
            <x-slot name="icon">
                <x-icons.patient class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            </x-slot>
        </x-sidebar.link>

    <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-sm text-gray-500">Registrasi Pasien</div> 
</x-perfect-scrollbar>