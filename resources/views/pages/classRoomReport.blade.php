@extends('layouts.app')
@section('contant')

<div id="profile">
    <h2 class="mb-4">ClassRoom Report</h2>
    <div class="row">
        <!-- LEFT PROFILE CARD -->
        @if (count($classRoomReport) > 0)
            @foreach ($classRoomReport as $item)
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body text-start">
                            <small><b>Exam:</b> {{ $item->exam }}</small><br>
                            <small><b>Subject:</b> {{ $item->subject }}</small><br>
                            <small><b>Exam Date:</b> {{ \Carbon\Carbon::parse($item->exam_date)->format('d M Y') }}</small><br>
                            <small><b>Marks Obtained:</b> {{ $item->marks_obtained }}</small><br>
                            <small><b>Max Marks:</b> {{ $item->max_marks }}</small><br>
                            <small><b>Grade:</b> {{ $item->grade }}</small><br>
                            @if(!empty($item->file_path))
                                @php
                                    $extension = pathinfo($item->file_path, PATHINFO_EXTENSION);
                                    $fileUrl = asset($item->file_path);
                                @endphp

                                <small><b>Attachment:</b>
                                    @if(in_array(strtolower($extension), ['jpg','jpeg','png','gif','webp','pdf']))
                                        <a href="{{ $fileUrl }}" target="_blank" class="text-primary">
                                            View {{ strtoupper($extension) }}
                                        </a>
                                    @else
                                        <a href="{{ $fileUrl }}" target="_blank" class="text-primary">
                                            Open File
                                        </a>
                                    @endif
                                </small><br>
                            @else
                                <small><b>Attachment:</b> Not available</small><br>
                            @endif
                            <small><b>Result Date:</b> {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</small><br>
                            <small><b>Description:</b> {{ $item->description ?? "N/L" }}</small><br>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-danger text-dark" role="alert">
                No Class Room Report Data found
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



