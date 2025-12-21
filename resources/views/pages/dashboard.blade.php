@extends('layouts.app')
@section('contant')

    <div id="dashboard">
        <h2 class="mb-4">Dashboard Overview</h2>
        
        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <a href="{{ url('classroom-report') }}" class="card stat-card text-decoration-none">
                    <div class="stat-icon text-primary">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="stat-value">{{ \DB::table('exam_report_cards')->where('student_id', Auth::id())->count()}}</div>
                    <div class="stat-label">Class Room Report</div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <a href="{{ url('teacher-feedback') }}" class="card stat-card text-decoration-none">
                    <div class="stat-icon text-success">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-value">{{ \DB::table('teacher_feedbacks')->where('student_id', Auth::id())->count()}}</div>
                    <div class="stat-label">Teacher FeedBack</div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <a href="{{ url('quiz') }}" class="card stat-card text-decoration-none">
                    <div class="stat-icon text-warning">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="stat-value">{{ \DB::table('assignments')->where('student_id', Auth::id())->count()}}</div>
                    <div class="stat-label">Total Quiz</div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <a href="{{ url('/student/doctor-consultation') }}" class="card stat-card text-decoration-none">
                    <div class="stat-icon text-success">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <div class="stat-value">{{ \DB::table('doctor_consultations')->where('student_id', Auth::id())->count()}}</div>
                    <div class="stat-label">Doctor Consultation</div>
                </a>
            </div>
        </div>

        <!-- Performance Chart -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="fas fa-chart-area me-2 text-primary"></i>Performance Overview</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="performanceChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="fas fa-trophy me-2 text-warning"></i>Event Calender</h5>
                    </div>
                    <div class="card-body">
<style>
    .fc, .fc *, .fc :after, .fc :before {
    box-sizing: border-box;
    text-align: center;
}

.fc-today-button{
    margin: 10px;
}

.fc .fc-toolbar-title {
    font-size: 20px;
    margin: 0;
}

/* Header toolbar layout */
/*  */

/* Month title (December 2025) */
.fc-toolbar-title {
    font-size: 25px !important;     /* title font size */
    font-weight: 600 !important;
    color: #FDB241 !important;
}

/* Today + arrows box spacing */
.fc-button-group, .fc-today-button {
    margin: 5px !important;
}

</style>
<div id="profile">
 
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js'></script>
<div class="content-wrapper" >
    <div id='calendar'></div>
</div>

</div>
<style>

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




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

          