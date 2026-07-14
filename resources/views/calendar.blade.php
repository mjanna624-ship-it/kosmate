<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            📅 Kalender Jadwal
        </h2>
    </x-slot>

    <div class="p-6">
        <div id="calendar"></div>
    </div>

    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.18/index.global.min.css" rel="stylesheet">

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.18/index.global.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {

                initialView: 'dayGridMonth',

                locale: 'id',

                events: @json($events),

            });

            calendar.render();

        });
    </script>

</x-app-layout>