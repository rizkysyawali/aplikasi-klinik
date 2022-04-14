<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aplikasi Klinik') }}</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css" />
    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div x-data="mainState" :class="{ dark: isDarkMode }" @resize.window="handleWindowResize" x-cloak>
        <div class="min-h-screen text-gray-900 bg-gray-100 dark:bg-dark-bg dark:text-gray-200">
            <!-- Sidebar -->
            <x-sidebar.sidebar />
            <!-- Page Wrapper -->
            <div class="flex flex-col min-h-screen" 
                :class="{ 
                    'lg:ml-64': isSidebarOpen,
                    'md:ml-16': !isSidebarOpen
                }" 
                style="transition-property: margin; transition-duration: 150ms;"
            >

                <!-- Navbar -->
                <x-navbar />

                <!-- Page Heading -->
                <header>
                    <div class="p-4 sm:p-6">
                        {{ $header }}
                    </div>
                </header>

                <!-- Page Content -->
                <main class="px-4 sm:px-6 flex-1">
                    {{ $slot }}
                </main>

                <!-- Page Footer -->
                <x-footer />
            </div>
        </div>
    </div>
    @include('sweetalert::alert')

    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/datepicker.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
     
    @stack('scripts')
    <script>
       
       $(document).ready(function() {
        var i = 1;
           $('#addd').click(function() {
                i++;

             $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    url: "/admin/fetchData",
                    type: "GET",
                    success: function(resp) {
                   
                    $('#form-submit').append('<div id="row'+i+'" class="grid gap-8 p-4 sm:grid-cols-2 md:grid-cols-4" ><div class="space-y-2"><label for="name" value="Data Berobat" /><div class="flex justify-start"><div class="mb-3 w-full "><select name="treatment[]" id="treatment" class="treatment form-select w-full text-base font-normal dark:text-white-700 dark:focus:ring-gray-600 dark:focus:bg-gray-600 dark:bg-gray-700 dark:border-gray-600 border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-white-700 focus:bg-white focus:border-blue-600 focus:outline-none"  aria-label="Default select example" required ></select></div></div></div><div class="space-y-2"><label for="name" value="Data Obat" /><div class="flex justify-start"><div class="mb-3 w-full "><select name="medicine[]" id="medicine" class="medicine form-select w-full text-base font-normal dark:text-white-700 dark:focus:ring-gray-600 dark:focus:bg-gray-600 dark:bg-gray-700 dark:border-gray-600 border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-white-700 focus:bg-white focus:border-blue-600 focus:outline-none"  aria-label="Default select example" required ></select></div></div></div><div class="space-y-2 mt-2"><input class="px-4 py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1 camount" type="number" name="amount[]" value="old("amount")"required placeholder="{{ __("Jumlah") }}" /></div><div class="mt-2"><button name="remove" id="'+i+'" href="#" class="btn-remove px-4 py-2 text-base justify-center w-full gap-2 bg-red-500 text-white hover:bg-red-600 focus:ring-red-500 px-4 py-2 text-base rounded-md">X</button></div></div>')
                    $('.treatment').empty();
                    $(".treatment").append('<option>--Pilih--</option>');
                    $(".medicine").empty();
                    $(".medicine").append('<option>--Pilih--</option>');
                    $.each(resp.data.treatments,function(key,value){
                        $('.treatment').append($("<option/>", {
                           value: value.id,
                           text: value.id
                        }));
                    });

                    $.each(resp.data.medicines,function(key,value){
                        $('.medicine').append($("<option/>", {
                           value: value.id,
                           text: value.name
                        }));
                    });
                        
                    },

                    
                    error: function(resp) {
                        console.log(resp);
                    }
                });
           })

           $(document).on('click', '.btn-remove',function(e) {
               e.preventDefault;
                var button_id = $(this).attr("id");
                $("#row"+button_id+'').remove();

            })
            $('#submit').click(function() {
               var medicine_id = $('.medicine').val();
                var treatment_id = $('.ctreatment').val();
                var amount = $('.camount').val();

                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url: "/admin/postData",
                type: "POST",
                data: 
                { 
                    treatment_id: treatment_id,
                    medicine_id: medicine_id,
                    amount: amount,
                },
                success: function(resp) {
                console.log(resp);
                },
                error: function(resp) {
                    console.log(resp);
                }
            });
            });
            
            function fetchData() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    url: "/admin/fetchData",
                    type: "GET",
                    success: function(resp) {
                    
                    $('#form-submit').html("");
                        $.each(resp.data.medicines, function (index, row) { 
                            $('#form-submit').append('<div class="grid gap-8 p-4 sm:grid-cols-2 md:grid-cols-4" ><div class="space-y-2"><label for="name" value="Data Berobat" /><div class="flex justify-start"><div class="mb-3 w-full "><select name="treatment" class="form-select w-full text-base font-normal dark:text-white-700 dark:focus:ring-gray-600 dark:focus:bg-gray-600 dark:bg-gray-700 dark:border-gray-600 border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-white-700 focus:bg-white focus:border-blue-600 focus:outline-none"  aria-label="Default select example" required ><option disabled selected>--Pilih--</option><option value="'+row.id+'">'+row.id+'</option></select></div></div></div><div class="space-y-2"><label for="name" value="Data Obat" /><div class="flex justify-start"><div id="fMed" class="mb-3 w-full "></div></div></div><div class="space-y-2 mt-2"><input class="px-4 py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1" type="number" name="amount[]" value="old("amount")"required placeholder="{{ __("Jumlah") }}" /></div><div class="mt-2"><button id="addd" href="#" class="btn-remove px-4 py-2 text-base justify-center w-full gap-2 bg-red-500 text-white hover:bg-red-600 focus:ring-red-500 px-4 py-2 text-base rounded-md">Tambah Obat</button></div></div>')
                            console.log(row);
                        })
                        $.each(resp.data.treatments, function (index, row) { 
                            // $('#fMed').append('<select name="treatment" class="form-select w-full text-base font-normal dark:text-white-700 dark:focus:ring-gray-600 dark:focus:bg-gray-600 dark:bg-gray-700 dark:border-gray-600 border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-white-700 focus:bg-white focus:border-blue-600 focus:outline-none"  aria-label="Default select example" required ><option disabled selected>--Pilih--</option><option value="'+row.id+'">'+row.name+'</option></select>')
                            console.log(row);
                        })
                    },

                    
                    error: function(resp) {
                        console.log(resp);
                    }
                });
            }
       })
    </script>
</body>

</html>

