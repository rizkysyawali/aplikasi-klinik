<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="mt-2">
        <!-- State cards -->
        <div class="grid gap-8 p-4 sm:grid-cols-2 md:grid-cols-4">
          <!-- Transaksi Obat -->
          <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
            <div>
              <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                Jumlah Transaksi Obat
              </h6>
              <span class="text-xl text-purple-500 font-semibold">{{ "Rp" . number_format($medTreat,0,',','.')  }}</span>
            </div>
            <div>
              <span>
                <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
              </span>
            </div>
          </div>

          <!-- Pasien Terdaftar -->
          <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
            <div>
              <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                Jumlah Pasien Terdaftar
              </h6>
            <span class="text-xl font-semibold text-purple-500">{{$patients}}</span>
            </div>
            <div>
              <span>
                <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
              </span>
            </div>
          </div>

          <!-- Orders card -->
          <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
            <div>
              <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                Jumlah Dokter
              </h6>
              <span class="text-xl font-semibold text-purple-500">{{$doctors}}</span>
            </div>
            <div>
              <span>
                <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
              </span>
            </div>
          </div>

          <!-- Jumlah Resep -->
          <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
            <div>
              <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                Jumlah Resep
              </h6>
              <span class="text-xl font-semibold text-purple-500">{{$treatment}}</span>
            </div>
            <div>
              <span>
                <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                </svg>
              </span>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>

