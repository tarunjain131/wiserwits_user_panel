@extends('layouts.app')
@section('contant')

    <div id="dashboard">
        <h2 class="mb-4">Dashboard Overview</h2>
        
        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card stat-card">
                    <div class="stat-icon text-primary">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="stat-value">8.5</div>
                    <div class="stat-label">CGPA</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card stat-card">
                    <div class="stat-icon text-success">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-value">92%</div>
                    <div class="stat-label">Average Score</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card stat-card">
                    <div class="stat-icon text-warning">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="stat-value">{{ \DB::table('assignments')->where('student_id', Auth::id())->count()}}</div>
                    <div class="stat-label">Total Quiz</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card stat-card">
                    <div class="stat-icon text-danger">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="stat-value">85%</div>
                    <div class="stat-label">Attendance</div>
                </div>
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
                        <h5 class="mb-0"><i class="fas fa-trophy me-2 text-warning"></i>Recent Achievements</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-medal fa-2x text-warning me-3"></i>
                            <div>
                                <strong>Top Performer</strong>
                                <p class="mb-0 small text-muted">Semester 4</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-star fa-2x text-primary me-3"></i>
                            <div>
                                <strong>Perfect Attendance</strong>
                                <p class="mb-0 small text-muted">October 2024</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-certificate fa-2x text-success me-3"></i>
                            <div>
                                <strong>Best Project Award</strong>
                                <p class="mb-0 small text-muted">Web Development</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

          