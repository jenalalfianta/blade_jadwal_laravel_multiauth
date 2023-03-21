<x-guest-layout>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <link href="{{asset('assets/css/fullcalendarcustom.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/css/flatpickr.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/css/toastr.min.css')}}" rel="stylesheet"/>
        <script src="{{asset('assets/js/jquery-3.6.3.js')}}"></script>
        <script src="{{asset('assets/js/fullcalendar-6.0.3.js')}}"></script>
        <script src="{{asset('assets/js/flowbite.min.js')}}"></script>
        <script src="{{asset('assets/js/moment-with-locales.min.js')}}"></script>
        <script src="{{asset('assets/js/flatpickr.min.js')}}"></script>
        <script src="{{asset('assets/js/flatpickr-locale-4.6.13-id.js')}}"></script>
        <script src="{{asset('assets/js/selectize.min.js')}}"></script>
        <script src="{{asset('assets/js/select2.min.js')}}"></script>
        <script src="{{asset('assets/js/toastr.min.js')}}"></script>

        <script>
            $( document ).ready(function() {
    //fullcalendar js instance
                let calendarEl = $('#calendar')[0]
                    calendar = new FullCalendar.Calendar(calendarEl, {
                    events: {{ Js::from($datas) }},
                    initialView: 'dayGridMonth',
                    headerToolbar: {
                        left: 'prev,today,next',
                        center: 'title',
                        right: 'listMonth dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    buttonText: {
                        today: 'hari ini',
                        month: 'bulan',
                        week: 'minggu',
                        day: 'hari',
                        listMonth: 'seluruh jadwal'
                    },
                    noEventsContent: 'Tidak ada jadwal untuk ditampilkan',
                    locale: 'id',
                    windowResizeDelay: 0,
                    height: 'auto',
                    slotMinTime: "07:00:00",
                    slotMaxTime: "17:00:00",
                    allDaySlot: false,
                    slotLabelFormat: {
                        hour: 'numeric',
                        minute: '2-digit',
                        omitZeroMinute: false,
                        meridiem: 'false'
                    },
                    eventTimeFormat: {
                        hour: 'numeric',
                        minute: '2-digit',
                        omitZeroMinute: false,
                        meridiem: 'false'
                    },
                    displayEventTime: true,
                    displayEventEnd: true,
                    eventDisplay: 'block',
                    editable: false,
                    selectable: false,
                })

                calendar.render()

            })
        </script>
    @endpush
</x-guest-layout>