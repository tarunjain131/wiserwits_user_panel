@extends('layouts.app')
@section('contant')

<div id="profile">
    <h2 class="mb-4">Teacher Feedback for Student</h2>
    <div class="row">
        <!-- LEFT PROFILE CARD -->

        @foreach ($teacher_feedbacks as $item)
            <div class="col-lg-4">
             <div class="card">
                <div class="card-body text-start">
                   <small><b>Subject: </b>{{$item->subject}}</small><br>
                   <small><b>FeedBack: </b> {{ $item->feedback }}</small><br>
                   <small><b>Date & Time: </b>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, h:i A') }}</small>
                </div>  
            </div>
        </div>
        @endforeach
        
        
        

    </div>
</div>

<script>
$(document).ready(function () {


});
</script>
@endsection



