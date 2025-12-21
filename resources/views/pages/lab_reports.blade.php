@extends('layouts.app')
@section('contant')
<div id="profile" style="background-color: #ffff; padding: 17px;">
    <h2 class="mb-4">Lab Reports</h2>
    <div class="row">
        <table id="diedPlanTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Share date</th>
                    <th>Share By</th>
                    <th>Valid Upto</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
               @if ($diedPlan && count($diedPlan) > 0)
                    @foreach ($diedPlan as $d)
                    @php
                        $const =  \App\Models\User::where('id',$d->shared_by_id)->first()
                    @endphp
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->title }}</td>
                        <td>{{ $d->share_date }}</td>
                        <td>{{ $const->name }}</td>
                        <td>{{ $d->valid_upto }}</td>
                        <td>
                            <a href="{{ asset('storage/'.$d->file_path) }}" download>
                                <i class="fa-solid fa-download"></i>
                            </a>
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
        $('#diedPlanTable').DataTable({
            pageLength: 10,
            ordering: true,
            searching: true,
            language: {
                emptyTable: "No data available"
            }
        });
    });
</script>


@endsection



