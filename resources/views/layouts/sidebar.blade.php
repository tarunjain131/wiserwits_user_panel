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
                    <i class="fas fa-chalkboard-teacher"></i> Diet Plan Access
                </a>
            </li>

            <li>
                <a href="{{ route('student.lab-report') }}"
                class="{{ Request::is('/student/lab-report*') ? 'active' : '' }}"
                onclick="showPage('lab-report')">
                    <i class="fas fa-chalkboard-teacher"></i> Lab Report
                </a>
            </li>

            <li>
                <a href="{{ route('student.appointment-test-reminder') }}"
                class="{{ Request::is('/student/appointment-test-reminder*') ? 'active' : '' }}"
                onclick="showPage('appointment-test-reminder')">
                    <i class="fas fa-chalkboard-teacher"></i>Appointment & Test Reminder
                </a>
            </li>

            <li>
                <a href="{{ route('student.doctor-consultation') }}"
                class="{{ Request::is('student/doctor-consultation*') ? 'active' : '' }}">
                    <i class="fas fa-user-md"></i> Doctor Consultation
                </a>
            </li>


            <li>
                <a href="{{ route('student.certificates') }}"
                class="{{ Request::is('/student/certificates*') ? 'active' : '' }}"
                onclick="showPage('certificates')">
                    <i class="fas fa-chalkboard-teacher"></i> Certificates
                </a>
            </li>

            <li>
                <a href="{{ route('student.workshopcalendar') }}"
                class="{{ Request::is('/student/workshop-calendar*') ? 'active' : '' }}"
                onclick="showPage('workshopcalendar')">
                    <i class="fas fa-chalkboard-teacher"></i>  Workshop & Webinar Calendar 
                </a>
            </li>

            <li>
                <a href="{{ route('gameQuiz') }}"
                class="{{ Request::is('interactive-quizzes-games*') ? 'active' : '' }}"
                onclick="showPage('interactive-quizzes-games')">
                    <i class="fas fa-question-circle"></i> Interactive Quizzes & Games
                </a>
            </li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>
    </div>