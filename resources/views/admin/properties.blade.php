@extends('layouts.admin')
@section('title')
Admin Category - ngekost.id
@endsection
@push('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush
@section('content')
<div class="content-area5">
        <div class="dashboard-content">
            <div class="dashboard-header clearfix">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h4>Kost Listing</h4>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="breadcrumb-nav">
                            <ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">

                    <table class="table data-table" id="datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Address</th>
                                <th>Featured</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            {{ url('url', []) }}
@endsection

@push('script')
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });
      var table = $('.data-table').DataTable({
          processing: false,
          serverSide: true,
          ajax: "{{ route('admin.properties.index') }}",
          columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'category_name', name: 'categories'},
            {data: 'address', name: 'address'},
            {data: 'featured', name: 'featured'},
            {data: 'status', name: 'status'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });

    $('body').on('click', '.deleteBtn', function () {
          var kost_id = $(this).data("id");
          confirm("Are You sure want to delete !");
          $.ajax({
              type: "DELETE",
              url: "{{ route('admin.properties.store') }}"+'/'+kost_id,
              success: function (data) {
                  toastr.success('Successfully Deleted Kost!', 'Success Alert', {timeOut: 5000});
                  table.draw();

              },
              error: function (data) {
                  toastr.danger('Error Saved Category!', 'Error Alert', {timeOut: 5000});
                  console.log('Error:', data);
              }
          });
      });
      $('body').on('click', '.activeBtn', function () {
          var id = $(this).data("id");
          var status = $(this).data("status");

          confirm("Are You sure want to active !");
          $.ajax({
              type: "POST",
              url: "{{ url('admin/properties/changeStatus') }}",

                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': id,
                    'status': status
                },
              success: function (data) {
                toastr.success('Successfully Update Users!', 'Success Alert', {timeOut: 5000});
                table.draw();
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
      });

    });
  </script>

@endpush
