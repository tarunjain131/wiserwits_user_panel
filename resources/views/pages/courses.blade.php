@extends('layouts.app')
@section('contant')
<!-- Courses Page -->
    <div id="courses">
        <h2 class="mb-4">Enrolled Courses</h2>
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

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card course-card h-100">
                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=400&h=200&fit=crop" class="course-img" alt="Course">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title">Web Development Bootcamp</h5>
                            <span class="badge bg-success">Active</span>
                        </div>
                        <p class="text-muted small mb-3">Prof. Michael Chen</p>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <small>Progress</small>
                                <small>60%</small>
                            </div>
                            <div class="progress progress-custom">
                                <div class="progress-bar bg-primary" style="width: 60%"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between text-muted small">
                            <span><i class="fas fa-clock me-1"></i>10 weeks</span>
                            <span><i class="fas fa-star me-1 text-warning"></i>4.9</span>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <button class="btn btn-primary btn-sm w-100">Continue Learning</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card course-card h-100">
                    <img src="https://images.unsplash.com/photo-1544383835-bda2bc66a55d?w=400&h=200&fit=crop" class="course-img" alt="Course">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title">Database Management Systems</h5>
                            <span class="badge bg-success">Active</span>
                        </div>
                        <p class="text-muted small mb-3">Prof. Emily Rodriguez</p>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <small>Progress</small>
                                <small>85%</small>
                            </div>
                            <div class="progress progress-custom">
                                <div class="progress-bar bg-info" style="width: 85%"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between text-muted small">
                            <span><i class="fas fa-clock me-1"></i>8 weeks</span>
                            <span><i class="fas fa-star me-1 text-warning"></i>4.7</span>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <button class="btn btn-primary btn-sm w-100">Continue Learning</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card course-card h-100">
                    <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=400&h=200&fit=crop" class="course-img" alt="Course">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title">Operating Systems</h5>
                            <span class="badge bg-warning">In Progress</span>
                        </div>
                        <p class="text-muted small mb-3">Prof. David Lee</p>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <small>Progress</small>
                                <small>45%</small>
                            </div>
                            <div class="progress progress-custom">
                                <div class="progress-bar bg-warning" style="width: 45%"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between text-muted small">
                            <span><i class="fas fa-clock me-1"></i>12 weeks</span>
                            <span><i class="fas fa-star me-1 text-warning"></i>4.6</span>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <button class="btn btn-primary btn-sm w-100">Continue Learning</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card course-card h-100">
                    <img src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?w=400&h=200&fit=crop" class="course-img" alt="Course">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title">Software Engineering</h5>
                            <span class="badge bg-success">Active</span>
                        </div>
                        <p class="text-muted small mb-3">Prof. Jennifer Wilson</p>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <small>Progress</small>
                                <small>70%</small>
                            </div>
                            <div class="progress progress-custom">
                                <div class="progress-bar bg-success" style="width: 70%"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between text-muted small">
                            <span><i class="fas fa-clock me-1"></i>10 weeks</span>
                            <span><i class="fas fa-star me-1 text-warning"></i>4.8</span>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <button class="btn btn-primary btn-sm w-100">Continue Learning</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card course-card h-100">
                    <img src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?w=400&h=200&fit=crop" class="course-img" alt="Course">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title">Computer Networks</h5>
                            <span class="badge bg-secondary">Completed</span>
                        </div>
                        <p class="text-muted small mb-3">Prof. Robert Anderson</p>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <small>Progress</small>
                                <small>100%</small>
                            </div>
                            <div class="progress progress-custom">
                                <div class="progress-bar bg-secondary" style="width: 100%"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between text-muted small">
                            <span><i class="fas fa-clock me-1"></i>8 weeks</span>
                            <span><i class="fas fa-star me-1 text-warning"></i>4.9</span>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <button class="btn btn-secondary btn-sm w-100">View Certificate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>         
@endsection