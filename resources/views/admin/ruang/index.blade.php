<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Ruang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="ruang">
                        @include('admin.ruang.layout.table')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <link href="{{asset('assets/css/toastr.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/css/fontawesome-v5.15.4.css')}}" rel="stylesheet"/>
        <script src="{{asset('assets/js/jquery-3.6.3.js')}}"></script>
        <script src="{{asset('assets/js/toastr.min.js')}}"></script>
        <script src="{{asset('assets/js/fontawesome-v5.15.4.js')}}"></script>
        
        <script>
            $(document).ready(function() {
    
    //toastr instance
                const toast = toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "1000",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                @if (Session::has('message'))
                    toastr["info"]("{{ session('message') }}", "Info")
                @endif


            })
        </script>
    @endpush
</x-admin-layout>