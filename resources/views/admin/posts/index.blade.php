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
                    <h4>Posts Blog</h4>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="breadcrumb-nav">
                        <ul>

                            <li>
                            <a class="btn btn-light" id="create-new" href="{{ route('admin.posts.create')}}"><i class="fa fa-plus"> Add Blog</i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                <table class="table table-bordered table-striped data-table" id="" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($posts as $item)
                            <tr>
                                <td>1</td>
                                <td><img src="{{Storage::url('posts/'.$item->image)}}" alt="" sizes="200px" srcset="" width="160"></td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->created_at}}</td>
                                <td style="display:flex">
                                    <a href="{{route('admin.posts.edit',$item->id)}}" class="edit btn btn-primary btn-sm mr-1"><i class="fa fa-pencil"></i></a>

                                    <form action="{{route('admin.posts.destroy',$item->id)}}" method="POST" ">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm " >
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
@endsection
@push('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
<script>


@endpush
