@extends('layouts.app')
@section('contant')

<div id="profile">
    <h2 class="mb-4">Quiz Student</h2>
    <div class="row">
        <!-- LEFT PROFILE CARD -->
        @if (count($quiz) > 0)
            @foreach ($quiz as $item)
                <div class="col-lg-4">
                <div class="card">
                    <div class="card-body text-start">
                        <small><b>Quiz Title:</b> {{ $item->title }}</small><br>

                        {{-- Deadline check --}}
                        @php
                            $deadlineExpired = \Carbon\Carbon::now()->gt(
                                \Carbon\Carbon::parse($item->deadline)
                            );
                        @endphp

                        <small><b>Quiz Link:</b>
                            @if($deadlineExpired)
                                <span class="text-danger">Deadline expired</span>
                            @else
                                <a href="javascript:void(0)"
                                    class="quiz-link text-primary fw-bold"
                                    data-id="{{ $item->id }}"
                                    data-link="{{ $item->assignment_link }}">
                                    Quiz Link
                                </a>
                                {{-- <a href="{{ $item->link }}" target="_blank">Quiz Link</a> --}}
                            @endif
                        </small><br>

                        @php
                            $statusColors = [
                                'pending'   => 'badge bg-warning text-light',
                                'submitted' => 'badge bg-info text-light',
                                'approved'  => 'badge bg-success text-light',
                                'rejected'  => 'badge bg-danger text-light',
                            ];
                            $colorClass = $statusColors[$item->assignment_status] ?? 'text-secondary fw-bold';
                        @endphp

                        <small>
                            <b>Status:</b>
                            <span class="{{ $colorClass }}">
                                {{ ucfirst($item->assignment_status) }}
                            </span>
                        </small><br>

                        <small><b>Assign Date:</b>
                            {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, h:i A') }}
                        </small><br>

                        <small><b>Deadline Date:</b>
                            {{ \Carbon\Carbon::parse($item->deadline)->format('d M Y, h:i A') }}
                        </small><br>

                        <small><b>Description:</b> {{ $item->description }}</small><br>
                    </div>
                </div>
            </div>
        @endforeach
        @else
            <div class="alert alert-danger text-dark" role="alert">
                No Quiz found
            </div>
        @endif
    </div>
</div>


<script>
$(document).on('click', '.quiz-link', function () {
    let quizId = $(this).data('id');
    let quizLink = $(this).data('link');
   console.log(quizLink);
    if (confirm('Once you open the quiz, it will be marked as submitted. Continue?')) {
        $.ajax({
            url: "{{ route('assignment.updateStatus') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: quizId,
                status: 'submitted'
            },
            success: function () {
                // redirect after status update
                window.open(quizLink, '_blank');
                location.reload(); // refresh to update UI
            },
            error: function () {
                alert('Failed to update status');
            }
        });
    }
});
</script>

@endsection



