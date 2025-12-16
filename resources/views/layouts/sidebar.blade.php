 <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <i class="fas fa-graduation-cap fa-3x text-white"></i>
            <h4>Wiserwits</h4>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('dashboard') }}" class="{{ Request::is('dashboard*') ? 'active' : '' }}" onclick="showPage('dashboard')"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="{{ route('profile') }}" class="{{ Request::is('profile*') ? 'active' : '' }} " onclick="showPage('profile')"><i class="fas fa-user"></i> My Profile</a></li>
            <li><a href="{{ route('courses') }}" class="{{ Request::is('courses*') ? 'active' : '' }} " onclick="showPage('courses')"><i class="fas fa-book"></i> My Courses</a></li>
            <li>
                <a href="{{ route('teacher-feedback') }}"
                class="{{ Request::is('teacher-feedback*') ? 'active' : '' }}"
                onclick="showPage('teacher-feedback')">
                    <i class="fas fa-comments"></i> Teacher Feedback
                </a>
            </li>
            <li>
                <a href="{{ route('quiz') }}"
                class="{{ Request::is('quiz*') ? 'active' : '' }}"
                onclick="showPage('quiz')">
                    <i class="fas fa-question-circle"></i> Quiz
                </a>
            </li>
            <li>
                <a href="{{ route('classroom-report') }}"
                class="{{ Request::is('classroom-report*') ? 'active' : '' }}"
                onclick="showPage('classroom-report')">
                    <i class="fas fa-chalkboard-teacher"></i> Classroom Report
                </a>
            </li>

             <li>
                <a href="{{ route('student.bmi-chart') }}"
                class="{{ Request::is('/student/bmi-chart*') ? 'active' : '' }}"
                onclick="showPage('bmi-chart')">
                    <i class="fas fa-chalkboard-teacher"></i> Growth & Vital Charts
                </a>
            </li>
            <li>
                <a href="{{ route('student.died-plan-access') }}"
                class="{{ Request::is('/student/deid-plan-access*') ? 'active' : '' }}"
                onclick="showPage('deid-plan-access')">
                    <i class="fas fa-chalkboard-teacher"></i> Died Plan Access
                </a>
            </li>

            <li>
                <a href="{{ route('student.doctor-consultation') }}"
                class="{{ Request::is('student/doctor-consultation*') ? 'active' : '' }}">
                    <i class="fas fa-user-md"></i> Doctor Consultation
                </a>
            </li>




            <li><a href="{{ route('student.performance') }}" class="{{ Request::is('performance*') ? 'active' : '' }} " onclick="showPage('performance')"><i class="fas fa-chart-line"></i> Performance</a></li>
            <li><a href="#" class="{{ Request::is('assignments*') ? 'active' : '' }} " onclick="showPage('assignments')"><i class="fas fa-tasks"></i> Assignments</a></li>
            <li><a href="#" class="{{ Request::is('schedule*') ? 'active' : '' }} " onclick="showPage('schedule')"><i class="fas fa-calendar"></i> Schedule</a></li>
            <li><a href="#" class="{{ Request::is('messages*') ? 'active' : '' }} " onclick="showPage('messages')"><i class="fas fa-envelope"></i> Messages</a></li>
            <li><a href="#" class="{{ Request::is('settings*') ? 'active' : '' }} " onclick="showPage('settings')"><i class="fas fa-cog"></i> Settings</a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>