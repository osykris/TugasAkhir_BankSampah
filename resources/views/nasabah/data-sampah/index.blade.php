@extends('layouts.app-dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Harga Sampah</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Data Harga Sampah</a></div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-md yajra-datatable" id="data_users_side" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Sampah</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" defer></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


<script type="text/javascript">
    $(function() {

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            pageLength: 10,
            ajax: "{{ route('data-sampah.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    sClass: 'text-center'
                },
                {
                    data: 'nama_jenisSampah',
                    name: 'nama_jenisSampah',
                    sClass: 'text-center'
                },
                {
                    data: 'harga',
                    name: 'harga',
                    sClass: 'text-center'
                },
            ]
        });
    });
</script>
@endsection