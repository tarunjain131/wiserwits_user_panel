@extends('layouts.app')

@section('contant')
<div class="container bg-white p-4">

    <div class="d-flex justify-content-between mb-4">
        <h2>Class Change</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#classChangeModal">
            <i class="fas fa-clock"></i> Class Change Request
        </button>
    </div>

    {{-- ================= CREATE MODAL ================= --}}
    <div class="modal fade" id="classChangeModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form action="{{ route('student.class-change.store') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5>Class Change Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="row">
                           
                            <div class="col-md-6 mb-3">
                                <label>Course</label>
                                <select name="course_id" class="form-control" required>
                                    @foreach($plans as $p)
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Requested Time</label>
                                <input type="time" name="student_request_time" class="form-control" required>
                            </div>
                        </div>

                        

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Submit</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    {{-- ================= TABLE ================= --}}
    <table id="classChangeTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Teacher</th>
                <th>Course</th>
                <th>Requested Time</th>
                <th>Scheduled Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($classChanges as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->teacher->name }}</td>
                <td>{{ $c->course->name }}</td>
                <td>{{ \Carbon\Carbon::parse($c->student_request_time)->format('d M Y h:i A') }}</td>
                <td>{{ \Carbon\Carbon::parse($c->scheduled_time)->format('d M Y h:i A') }}</td>
                <td>
                    <span class="badge bg-{{ $c->status == 'approved' ? 'success' : ($c->status == 'rejected' ? 'danger' : 'warning') }}">
                        {{ ucfirst($c->status) }}
                    </span>
                </td>
                <td>
                    <button class="btn btn-sm btn-warning editBtn"
                        data-id="{{ $c->id }}"
                        data-request="{{ $c->student_request_time }}"
                        data-scheduled="{{ $c->scheduled_time }}"
                        data-desc="{{ $c->description }}">
                        <i class="fas fa-edit"></i>
                    </button>

                    <button class="btn btn-sm btn-danger deleteBtn"
                        data-id="{{ $c->id }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

{{-- ================= EDIT MODAL ================= --}}
<div class="modal fade" id="editModal" tabindex="-1">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<form method="POST" id="editForm">
@csrf
@method('PUT')

<div class="modal-header">
    <h5>Edit Class Change</h5>
    <button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

    <div class="mb-3">
        <label>Requested Time</label>
        <input type="datetime-local" name="student_request_time" id="edit_request" class="form-control">
    </div>

    <div class="mb-3">
        <label>Scheduled Time</label>
        <input type="datetime-local" name="scheduled_time" id="edit_scheduled" class="form-control">
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" id="edit_desc" class="form-control"></textarea>
    </div>

</div>

<div class="modal-footer">
    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    <button class="btn btn-success">Update</button>
</div>

</form>
</div>
</div>
</div>

{{-- ================= DELETE MODAL ================= --}}
<div class="modal fade" id="deleteModal" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">

<form method="POST" id="deleteForm">
@csrf
@method('DELETE')

<div class="modal-header">
    <h5 class="text-danger">Delete Request</h5>
    <button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
    Are you sure you want to delete this request?
</div>

<div class="modal-footer">
    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    <button class="btn btn-danger">Delete</button>
</div>

</form>
</div>
</div>
</div>

{{-- ================= JS ================= --}}
<script>
$(document).ready(function () {
    $('#classChangeTable').DataTable();
});

$(document).on('click', '.editBtn', function () {
    let id = $(this).data('id');

    $('#edit_request').val($(this).data('request').replace(' ', 'T'));
    $('#edit_scheduled').val($(this).data('scheduled').replace(' ', 'T'));
    $('#edit_desc').val($(this).data('desc'));

    $('#editForm').attr('action', '/student/class-change/' + id);
    $('#editModal').modal('show');
});

$(document).on('click', '.deleteBtn', function () {
    let id = $(this).data('id');
    $('#deleteForm').attr('action', '/student/class-change/' + id);
    $('#deleteModal').modal('show');
});
</script>

@endsection
