@extends('layouts.app')
@section('contant')
<div id="profile" style="background-color: #ffff; padding: 17px;">
    <h2 class="mb-4">Certificates & Digital Badges</h2>
    <div class="row">
        <table id="CertificatesTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
               @if ($certificates && count($certificates) > 0)
                    @foreach ($certificates as $d)
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->title }}</td>
                        <td>
                            <a href="{{ asset('storage/'.$d->certificate_file) }}" download>
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
        $('#CertificatesTable').DataTable({
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



