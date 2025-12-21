@extends('layouts.app')

@section('contant')
<div id="profile">
    <h2 class="mb-4">Appointment & Test Reminders</h2>

    <div class="row">
        <table id="remindersTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @if ($reminders && count($reminders) > 0)
                    @foreach ($reminders as $r)
                        <tr>
                            <td>{{ $r->id }}</td>
                            <td>{{ $r->title }}</td>
                            <td>{{ \Carbon\Carbon::parse($r->appointment_date)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($r->appointment_time)->format('h:i A') }}</td>
                            <td>{{ $r->description }}</td>
                            <td>
                                <span class="badge bg-{{ 
                                    $r->status == 'completed' ? 'success' : 
                                    ($r->status == 'cancelled' ? 'danger' : 'warning') 
                                }}">
                                    {{ ucfirst($r->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function () {
    $('#remindersTable').DataTable({
        pageLength: 10,
        ordering: true,
        searching: true,
        language: {
            emptyTable: "No reminders available"
        }
    });
});
</script>
@endsection
