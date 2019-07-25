@extends('layouts.admin')
@section('title')
Admin Category - ngekost.id
@endsection
@push('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<div class="content-area5">
    <div class="dashboard-content">
        <div class="dashboard-header clearfix">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h4>Slider</h4>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="breadcrumb-nav">
                        <ul>

                            <li>
                            <a class="btn btn-light" id="create-new" href="{{ route('admin.sliders.create')}}"><i class="fa fa-plus"> Add Slider</i></a>
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
                            <th>Image</th>
                            <th>Title</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
@endsection
@push('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#slider-image-input").fileinput();
    });
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('admin.sliders.index') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'image', name: 'image',orderable: false, searchable: false},
              {data: 'title', name: 'title',orderable: false, searchable: false},
              {data: 'created_at', name: 'created_at'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });


      $('body').on('click', '.deleteBtn', function () {
          var category_id = $(this).data("id");
          confirm("Are You sure want to delete !");
          $.ajax({
              type: "DELETE",
              url: "{{ route('admin.sliders.store') }}"+'/'+category_id,
              success: function (data) {
                  toastr.success('Successfully Deleted Sliders!', 'Success Alert', {timeOut: 5000});
                  table.draw();

              },
              error: function (data) {
                  toastr.danger('Error Saved Sliders!', 'Error Alert', {timeOut: 5000});
                  console.log('Error:', data);
              }
          });
      });
    });
  </script>


@endpush
