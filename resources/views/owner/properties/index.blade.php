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
                    <h4>My Properties</h4>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="breadcrumb-nav">
                        <ul>
                        <a class="btn btn-light" id="create-new" href="{{ route('owner.properties.create')}}"><i class="fa fa-plus"> Add Property</i></a>
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
                            <th>Status</th>
                            <th>Created at</th>
                            <th style="display:flex">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Modal --}}
        @endsection
        @push('script')
        <script type="text/javascript">


            // Ajax CRUD
            $(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var table = $('.data-table').DataTable({
                    processing: false,
                    serverSide: true,
                    ajax: "{{ route('owner.properties.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'category_name',
                            name: 'category_name'
                        },
                        {
                            data: 'address',
                            name: 'address'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });
                // Active Button
                $('body').on('click', '.activeBtn', function () {
                    var id = $(this).data("id");
                    var status = $(this).data("status");

                    confirm("Are You sure want to active !");
                    $.ajax({
                        type: "POST",
                        url: "{{ URL::route('owner.changeStatus') }}",
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'id': id,
                            'status': status
                        },
                        success: function (data) {
                            toastr.success('Successfully Update Users!', 'Success Alert', {
                                timeOut: 5000
                            });
                            table.draw();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                });
                // Delete Button
                $('body').on('click', '.deleteBtn', function () {
                    var category_id = $(this).data("id");
                    confirm("Are You sure want to delete !");
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('owner/properties') }}"+'/'+category_id,
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
