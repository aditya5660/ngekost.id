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
                        <h4>Users Listing</h4>
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
                                <th>Email</th>
                                <th>Role</th>
                                <th>Verified</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
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
          ajax: "{{ route('admin.users.index') }}",
          columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'role', name: 'role'},
            {data: 'verified', name: 'verified'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      $('body').on('click', '.activeBtn', function () {
          var id = $(this).data("id");
          var verified = $(this).data("verified");

          confirm("Are You sure want to active !");
          $.ajax({
              type: "POST",
              url: "{{ URL::route('admin.userChangeStatus') }}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': id,
                    'verified': verified
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
