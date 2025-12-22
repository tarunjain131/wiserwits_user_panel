@extends('layouts.app')
@section('contant')
<!-- Courses Page -->
    <div id="courses">
        <h2 class="mb-4">Language Courses</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card course-card h-100">
                    <img src="https://images.unsplash.com/photo-1516116216624-53e697fedbea?w=400&h=200&fit=crop" class="course-img" alt="Course">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title">Data Structures & Algorithms</h5>
                            <span class="badge bg-success">Active</span>
                        </div>
                        <p class="text-muted small mb-3">Prof. Sarah Johnson</p>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <small>Progress</small>
                                <small>75%</small>
                            </div>
                            <div class="progress progress-custom">
                                <div class="progress-bar bg-success" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between text-muted small">
                            <span><i class="fas fa-clock me-1"></i>12 weeks</span>
                            <span><i class="fas fa-star me-1 text-warning"></i>4.8</span>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <button class="btn btn-primary btn-sm w-100">Continue Learning</button>
                    </div>
                </div>
            </div>
        </div>
    </div>         
@endsection