@extends('layouts.app2')


@section('content')
<title>User Management</title>
<link href=https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css />
<!-- begin:: Content Head -->
<div id="content">
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
</nav>
<!-- end:: Content Head -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h3 class="kt-subheader__title"><a href="{{route('inquery.create')}}" class="btn btn-primary">Add User <a/></button></h3>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">User Listing</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="data-table table table-bordered" id="kt_table_1" width="100%" cellspacing="0">
          <thead>
          <tr>
                <th width="20px">No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>

                <th width="110px">Action</th>
            </tr>
          </thead>
          <tbody>
        </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- begin:: Content -->
</div>
<!-- end:: Content -->
@section('pagescript')
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!--end::Page Vendors -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
$(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('inquery.index') }}",
        columns: [ 
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'},                              ]
    });
});
 $(document).on('click', '.status_change', function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: id,
            type: 'GET',
            success: function (result) {
                if (result.status == true) {
                    toastr.success(result.Message);
                    table.draw(true);
                } else {
                    toastr.error(result.Message);
                }
            }
        });
    });
</script>
@endsection
@stop


