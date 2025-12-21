 
 <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <i class="fas fa-graduation-cap fa-3x text-white"></i>
            <h4>Wiserwits</h4>
        </div>


        <ul class="sidebar-menu">

              <li><a href="{{ route('dashboard') }}" class="{{ Request::is('dashboard*') ? 'active' : '' }}" onclick="showPage('dashboard')"><i class="fas fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('profile') }}" class="{{ Request::is('profile*') ? 'active' : '' }} " onclick="showPage('profile')"><i class="fas fa-user"></i> My Profile</a></li>
       
    <!-- ========= EDUCATION MENU ========= -->
    <li class="sidebar-group">
       
        <a data-bs-toggle="collapse" href="#educationMenu" role="button" aria-expanded="false">
            <i class="fas fa-book-reader"></i> Education
        </a>

        <ul class="collapse" id="educationMenu">
            {{-- <li><a href="{{ route('courses') }}"><i class="fas fa-book"></i> My Courses</a></li> --}}
            <li><a href="{{ route('teacher-feedback') }}"><i class="fas fa-comments"></i> Teacher Feedback</a></li>
            <li><a href="{{ route('quiz') }}"><i class="fas fa-question-circle"></i> Quiz</a></li>
            <li><a href="{{ route('classroom-report') }}"><i class="fas fa-chalkboard"></i> Classroom Report</a></li>
        </ul>
    </li>

    <!-- ========= HEALTH MENU ========= -->
    <li class="sidebar-group">
        <a data-bs-toggle="collapse" href="#healthMenu" role="button" aria-expanded="false">
            <i class="fas fa-heartbeat"></i> Health
        </a>

        <ul class="collapse" id="healthMenu">
            <li><a href="{{ route('student.bmi-chart') }}"><i class="fas fa-chart-line"></i> Growth & Vital Charts</a></li>
            <li><a href="{{ route('student.died-plan-access') }}"><i class="fas fa-utensils"></i> Diet Plan</a></li>
            <li><a href="{{ route('student.lab-report') }}"><i class="fas fa-vials"></i> Lab Report</a></li>
            <li><a href="{{ route('student.doctor-consultation') }}"><i class="fas fa-user-md"></i> Doctor Consultation</a></li>
        </ul>
    </li>

    <!-- ========= ACTIVITIES & CERTIFICATES ========= -->
    <li class="sidebar-group">
        <a data-bs-toggle="collapse" href="#activityMenu" role="button" aria-expanded="false">
            <i class="fas fa-trophy"></i> Activities
        </a>

        <ul class="collapse" id="activityMenu">
            <li><a href="{{ route('student.certificates') }}"><i class="fas fa-certificate"></i> Certificates</a></li>
            <li><a href="{{ route('student.workshopcalendar') }}"><i class="fas fa-calendar"></i> Workshop Calendar</a></li>
            <li><a href="{{ route('student.performance') }}"><i class="fas fa-chart-area"></i> Performance</a></li>
            <li><a href="{{ route('gameQuiz') }}"><i class="fas fa-gamepad"></i> Games</a></li>
        </ul>
    </li>

    <!-- ========= ACCOUNT ========= -->
   <li>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>

</ul>


<style>
    .sidebar-group > a {
    display: block;
    color: #fff;
    padding: 10px 15px;
    font-size: 15px;
}

.sidebar-group ul li a {
    display: block;
    padding: 8px 30px;
    font-size: 14px;
    color: #ddd;
}

.sidebar-group ul li a:hover {
    color: #FDB241;
}

.collapse .active {
    color: #FDB241;
}
.sidebar-group ul {
    list-style-type: none !important;
    padding-left: 0 !important;
    margin-left: 5px;
}

</style>
</div>