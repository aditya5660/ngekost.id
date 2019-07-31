@extends('layouts.admin')
@section('title')
Transaction
@endsection
@section('content')
<div class="content-area5">
    <div class="dashboard-content">
        <div class="dashboard-header clearfix">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h4>Transaction</h4>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="breadcrumb-nav">
                        <ul>

                            <li>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="font-size:12px;">

                <table class="table table-bordered table-striped data-table" id="datatable" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Property</th>
                            <th>Users</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

@endsection


@push('script')
<script>
$(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('admin.transaction.index') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'property.title', name: 'property.title',orderable: false, searchable: false},
              {data: 'user.name', name: 'user.name'},
              {data: 'amount', name: 'amount'},
              {data: 'status', name: 'status'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      $('body').on('click', '.acceptBtn', function () {
          var id = $(this).data("id");

          confirm("Are You sure want to accept !");
          $.ajax({
              type: "PUT",
              url: "{{ url('admin/transaction') }}"+'/'+id,
              success: function (data) {
                toastr.success('Successfully Accrpt Users!', 'Success Alert', {timeOut: 5000});
                table.draw();
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
      });
      $('body').on('click', '.deleteBtn', function () {
          var id = $(this).data("id");
          confirm("Are You sure want to delete !");
          $.ajax({
              type: "DELETE",
              url: "{{ url('admin/transaction') }}"+'/'+id,
              success: function (data) {
                  toastr.success('Successfully Canceled Transaction!', 'Success Alert', {timeOut: 5000});
                  table.draw();
              },
              error: function (data) {
                  toastr.danger('Error Canceled Transaction!', 'Error Alert', {timeOut: 5000});
                  console.log('Error:', data);
              }
          });
      });
});
</script>
@endpush
