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
                    <h4>Post Category</h4>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="breadcrumb-nav">
                        <ul>

                            <li>
                                <a class="btn btn-light" id="create-new"><i class="fa fa-plus"> Add Category</i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                <table class="table table-bordered table-striped data-table" id="datatable" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="modal fade" id="ajaxModal" aria-hidden="true" style="z-index:10000">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalTitle"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="modalForm" name="modalForm" class="form-horizontal">
                            @csrf
                            <input type="hidden" name="category_id" id="category_id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                                </div>
                            </div>
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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
          processing: true,
          serverSide: true,
          ajax: "{{ route('admin.post_category.index') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'name',orderable: false, searchable: false},
              {data: 'created_at', name: 'created_at'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
      $('#create-new').click(function () {
          $('#saveBtn').val("create-category");
          $('#category_id').val('');
          $('#modalForm').trigger("reset");
          $('#modalTitle').html("Create New Category");
          $('#ajaxModal').modal('show');
      });
      $('body').on('click', '.editBtn', function () {
        var category_id = $(this).data('id');
        $.get("{{ route('admin.post_category.index') }}" +'/' + category_id +'/edit', function (data) {
            $('#modalTitle').html("Edit Category");
            $('#saveBtn').val("edit-user");
            $('#ajaxModal').modal('show');
                $('#category_id').val(data.id);
                $('#name').val(data.name);

        })
     });
      $('#saveBtn').click(function (e) {
          e.preventDefault();
          $(this).html('Sending..');
          $.ajax({
            data: $('#modalForm').serialize(),
            url: "{{ route('admin.post_category.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#modalForm').trigger("reset");
                $('#ajaxModal').modal('hide');
                toastr.success('Successfully Saved Category!', 'Success Alert', {timeOut: 5000});
                table.draw();

            },
            error: function (data) {
                console.log('Error:', data);
                toastr.danger('Error Saved Category!', 'Error Alert', {timeOut: 5000});
                $('#saveBtn').html('Save Changes');
            }
        });
      });
      $('body').on('click', '.deleteBtn', function () {
          var category_id = $(this).data("id");
          confirm("Are You sure want to delete !");
          $.ajax({
              type: "DELETE",
              url: "{{ route('admin.post_category.store') }}"+'/'+category_id,
              success: function (data) {
                  toastr.success('Successfully Deleted Category!', 'Success Alert', {timeOut: 5000});
                  table.draw();

              },
              error: function (data) {
                  toastr.danger('Error Saved Category!', 'Error Alert', {timeOut: 5000});
                  console.log('Error:', data);
              }
          });
      });
    });
  </script>


@endpush
