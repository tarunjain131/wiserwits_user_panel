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
                            @php
                               $imageUrl = 'https://wiserwits.in/admin_panel/public/uploads/courses/images/oCC6uCXpcawPDPpGKAcKRAGqU1wXovMGRKvy5Hsw.png';
                            @endphp
                            <a onclick="downloadImage('{{ $imageUrl }}','image.png')"><i class="fa-solid fa-download"></i></a>

                            {{-- <a href="" download>
                                <i class="fa-solid fa-download"></i>
                            </a> --}}
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>


<script>

    function downloadImage(url, name="text") {
    fetch(url)
      .then(r => r.blob())
      .then(b => {
        const a = document.createElement('a');
        a.href = URL.createObjectURL(b);
        a.download = name;
        a.click();
      });
}
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



