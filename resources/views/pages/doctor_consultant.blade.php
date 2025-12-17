@extends('layouts.app')
@section('contant')
<div id="profile">
   <div class="d-flex justify-content-between mb-4">
     <h2 class="">Doctor Consultation</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#doctorConsultationModal">
        <i class="fas fa-user-md"></i> Request Doctor Consultation
    </button>
   </div>

    <div class="modal fade" id="doctorConsultationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form action="{{ route('student.doctor-consultation.store') }}" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-user-md"></i> Doctor Consultation Request
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Patient Name</label>
                            <input type="text" name="patient_name" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Doctor Name</label>
                            <input type="text" name="doctor_name" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Problem</label>
                        <textarea name="problem" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Symptoms (Optional)</label>
                        <textarea name="symptoms" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Preferred Date & Time</label>
                        <input type="datetime-local" name="scheduled_at" class="form-control" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Submit Request
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>


    <div class="row">
        <table id="doctorConsultationsTable" class="display">
           <thead>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Doctor Name</th>
                <th>Scheduled At</th>
                <th>Status</th>
                <th>Feedback</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
                @if ($doctorConsultations && count($doctorConsultations) > 0)
                    @foreach ($doctorConsultations as $d)
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->patient_name }}</td>
                        <td>{{ $d->doctor_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($d->scheduled_at)->format('d-m-Y h:i A') }}</td>
                        <td>
                            <span class="badge bg-{{ $d->status == 'completed' ? 'success' : ($d->status == 'cancelled' ? 'danger' : 'warning') }}">
                                {{ ucfirst($d->status) }}
                            </span>
                        </td>
                        <td>{{ $d->feedback ?? '—' }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning editBtn"
                                data-id="{{ $d->id }}"
                                data-patient="{{ $d->patient_name }}"
                                data-doctor="{{ $d->doctor_name }}"
                                data-problem="{{ $d->problem }}"
                                data-symptoms="{{ $d->symptoms }}"
                                data-scheduled="{{ $d->scheduled_at }}">
                                <i class="fas fa-edit"></i>
                            </button>
                             <!-- Delete -->
                            <button class="btn btn-sm btn-danger deleteBtn"
                                data-id="{{ $d->id }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>

                    </tr>
                    @endforeach
                @endif

                <div class="modal fade" id="deleteConsultationModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <form method="POST" id="deleteConsultationForm">
                                @csrf
                                @method('DELETE')

                                <div class="modal-header">
                                    <h5 class="modal-title text-danger">
                                        Delete Consultation
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <p>Are you sure you want to delete this consultation?</p>
                                    <p class="text-danger"><strong>This action cannot be undone.</strong></p>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button class="btn btn-danger">Yes, Delete</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>


                <div class="modal fade" id="editConsultationModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <form method="POST" id="editConsultationForm">
                                @csrf
                                @method('PUT')

                                <div class="modal-header">
                                    <h5>Edit Doctor Consultation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">

                                    <input type="hidden" name="id" id="edit_id">

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>Patient Name</label>
                                            <input type="text" name="patient_name" id="edit_patient" class="form-control" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label>Doctor Name</label>
                                            <input type="text" name="doctor_name" id="edit_doctor" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label>Problem</label>
                                        <textarea name="problem" id="edit_problem" class="form-control" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label>Symptoms</label>
                                        <textarea name="symptoms" id="edit_symptoms" class="form-control"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label>Scheduled At</label>
                                        <input type="datetime-local" name="scheduled_at" id="edit_scheduled" class="form-control" required>
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

            </tbody>

        </table>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('#doctorConsultationsTable').DataTable({
            pageLength: 10,
            ordering: true,
            searching: true,
            language: {
                emptyTable: "No data available"
            }
        });
    });
    $(document).on('click', '.deleteBtn', function () {

        let id = $(this).data('id');

        $('#deleteConsultationForm').attr(
            'action',
            '/student/doctor-consultation/' + id
        );

        $('#deleteConsultationModal').modal('show');
    });


    $(document).on('click', '.editBtn', function () {

        let id = $(this).data('id');

        $('#edit_id').val(id);
        $('#edit_patient').val($(this).data('patient'));
        $('#edit_doctor').val($(this).data('doctor'));
        $('#edit_problem').val($(this).data('problem'));
        $('#edit_symptoms').val($(this).data('symptoms'));

        // Convert datetime for input
        let dt = $(this).data('scheduled').replace(' ', 'T');
        $('#edit_scheduled').val(dt);

        $('#editConsultationForm').attr(
            'action',
            '/student/doctor-consultation/' + id
        );

        $('#editConsultationModal').modal('show');
    });
</script>



@endsection



