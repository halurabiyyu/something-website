@extends('layout.template')

@section('content')

<div class="card">
  <div class="card-header">
    <h3 class="card-title m-auto">{{$breadcrumb->title}}</h3>
    <div class="card-tools"></div>
  </div>
  <div class="card-body">
    @if (session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
      {{session('error')}}
    </div>
    @endif
    <a href="{{route('roles.create')}}" class="btn btn-success my-1">Tambah</a>
    <div class="table-responsive">
      <table id="userTable" class="table table-striped">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Aksi</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endpush

@push('js')
<script>
$(document).ready(function() {
    $('#userTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('roles.list') }}",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            error: function (xhr, error, thrown) {
                console.log('Error:', error);
            }
        },
        columns: [
            {
              data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
            },
            {
                data: 'code',
                name: 'code'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'aksi',
                name: 'aksi',
                orderable: false,
                searchable: false
            }
        ],
        language: {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
            zeroRecords: "No matching records found",
            emptyTable: "No data available in table"
        }
    });
});
</script>
@endpush