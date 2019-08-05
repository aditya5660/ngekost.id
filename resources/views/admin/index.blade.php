@extends('layouts.admin')
@section('title')
Admin Dashboard - ngekost.id
@endsection
@section('content')
<div class="content-area5">
        <div class="dashboard-content">
            <div class="dashboard-header clearfix">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h4>Hello , {{Auth::user()->name}}</h4>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="breadcrumb-nav">
                            <ul>
                                <li>
                                    <a href="index.html">Index</a>
                                </li>
                                <li>
                                    <a href="#" class="active">Dashboard</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="ui-item bg-success">
                        <div class="left">
                            <h4>{{$propertycount}}</h4>
                            <p>Total Property</p>
                        </div>
                        <div class="right">
                            <i class="fa fa-home"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="ui-item bg-warning">
                        <div class="left">
                            <h4>{{$transactioncount}}</h4>
                            <p>Total Transaction</p>
                        </div>
                        <div class="right">
                            <i class="flaticon-bill"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="ui-item bg-active">
                        <div class="left">
                            <h4>{{$postcount}}</h4>
                            <p>Total Post</p>
                        </div>
                        <div class="right">
                            <i class="fa fa-pencil"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="ui-item bg-dark">
                        <div class="left">
                            <h4>{{$usercount}}</h4>
                            <p>Total Users</p>
                        </div>
                        <div class="right">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="dashboard-list">
                        <div class="dashboard-message bdr clearfix ">
                            <div class="tab-box-2">
                                <div class="clearfix mb-30 comments-tr">
                                    <span>Recent Properties</span>
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                        <div class="table-responsive">
                                            <table class="table table-hover dashboard-task-infos">
                                                <thead>
                                                    <tr>
                                                        <th>SL.</th>
                                                        <th>Title</th>
                                                        <th>Price</th>
                                                        <th>City</th>
                                                        <th>Owners</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($properties as $key => $property)
                                                    <tr>
                                                        <td>{{ ++$key }}.</td>
                                                        <td>
                                                            <span title="{{ $property->title }}">
                                                                {{ str_limit($property->title, 10) }}
                                                            </span>
                                                        </td>
                                                        <td>{{ $property->category->category_name }}</td>
                                                        <td>{{ $property->provinces }}</td>
                                                        <td>{{ strtok($property->user->name, " ")}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="dashboard-list">
                        <div class="dashboard-message bdr clearfix ">
                            <div class="tab-box-2">
                                <div class="clearfix mb-30 comments-tr">
                                    <span>New Member</span>
                                </div>
                                <div class="tab-content" id="pills-tabContent2">
                                    <div class="table-responsive">
                                        <table class="table table-hover dashboard-task-infos">
                                            <thead>
                                                <tr>
                                                    <th>SL.</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $key => $user)
                                                <tr>
                                                    <td>{{ ++$key }}.</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->role->name }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="dashboard-list">
                        <div class="dashboard-message bdr clearfix ">
                            <div class="tab-box-2">
                                <div class="clearfix mb-30 comments-tr">
                                    <span>New Transaction</span>
                                </div>
                                <div class="tab-content" id="pills-tabContent2">
                                    <div class="table-responsive">
                                        <table class="table table-hover dashboard-task-infos">
                                            <thead>
                                                <tr>
                                                    <th>SL.</th>
                                                    <th>Property</th>
                                                    <th>Users</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transaction as $key => $item)
                                                <tr>
                                                    <td>{{ ++$key }}.</td>
                                                    <td>{{ $item->property->title }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td><button disabled="disabled" class="btn btn-xs btn-primary">{{ ucfirst($item->status) }}</button></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="dashboard-list">
                        <div class="dashboard-message bdr clearfix ">
                            <div class="tab-box-2">
                                <div class="clearfix mb-30 comments-tr">
                                    <span>New Post</span>
                                </div>
                                <div class="tab-content" id="pills-tabContent2">
                                    <div class="table-responsive">
                                        <table class="table table-hover dashboard-task-infos">
                                            <thead>
                                                <tr>
                                                    <th>SL.</th>
                                                    <th>Title</th>
                                                    <th>Created At</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($posts as $key => $post)
                                                @php
                                                if ($post->status == 1) {
                                                    $status = 'Published';
                                                } elseif($post->status == 2) {
                                                    $status = 'Not Published';
                                                }

                                                @endphp
                                                <tr>
                                                    <td>{{ ++$key }}.</td>
                                                    <td>{{ $post->title }}</td>
                                                    <td>{{ $post->created_at->format('d, M Y H:i') }}</td>
                                                    <td>{{ $status }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
