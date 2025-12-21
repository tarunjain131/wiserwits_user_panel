@extends('layouts.app')
@section('contant')
<div id="profile">
    <h2 class="mb-4">WorkShop Calender</h2>
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js'></script>
<div class="content-wrapper" style="min-height: 345px;">
    <div id='calendar'></div>
</div>

</div>
<style>
#calendar {
    max-width: 900px;
    margin: 40px auto;
}
</style>
 <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

   document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: "{{ route('workshop.events') }}",
            eventClick: function(info) {
            Swal.fire({
                title: info.event.title,
                text: info.event.extendedProps.description,
                showClass: {
                    popup: `
                    animate__animated
                    animate__fadeInUp
                    animate__faster
                    `
                },
                hideClass: {
                    popup: `
                    animate__animated
                    animate__fadeOutDown
                    animate__faster
                    `
                }
            });

                // alert(info.event.title + "\n" + info.event.extendedProps.description);
            }
        });

        calendar.render();
    });



    $(document).ready(function () {
        $('#diedPlanTable').DataTable({
            pageLength: 10,
            ordering: true,
            searching: true,
            language: {
                emptyTable: "No data available"
            }
        });
    });
</script>


@endsection



