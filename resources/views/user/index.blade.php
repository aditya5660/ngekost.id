@extends('layouts.admin')
@section('title')
User Dashboard - ngekost.id
@endsection

@section('content')
<div class="content-area5">
        <div class="dashboard-content">
            <div class="dashboard-header clearfix">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h4>Hello , {{ Auth::user()->name }}</h4>
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
                <div class="col-lg-4 col-md-3 col-sm-6">
                    <div class="ui-item bg-primary">
                        <div class="left">
                            <h4>{{$favoritedpropertycount}}</h4>
                            <p>Favorited Property</p>
                        </div>
                        <div class="right">
                            <i class="fa fa-heart-o"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-3 col-sm-6">
                    <div class="ui-item bg-warning">
                        <div class="left">
                            <h4>{{$transactioncount}}</h4>
                            <p>Transaction</p>
                        </div>
                        <div class="right">
                            <i class="flaticon-bill"></i>
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
                                    <span>New Properties</span>
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
                                                @foreach($favoritedproperty as $key => $item)
                                                @php
                                                if ($item->status == 1) {
                                                    $status = 'Published';
                                                } elseif($item->status == 2) {
                                                    $status = 'Not Published';
                                                }

                                                @endphp
                                                <tr>
                                                    <td>{{ ++$key }}.</td>
                                                    <td>{{ $item->property->title }}</td>
                                                    <td>{{ $item->created_at->format('d, M Y H:i') }}</td>
                                                    <td><button disabled="disabled" class="btn btn-primary btn-xs">{{ $status }}</button></td>
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
                                                    <th>Owner</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transaction as $key => $item)
                                                <tr>
                                                    <td>{{ ++$key }}.</td>
                                                    <td>{{ $item->property->title }}</td>
                                                    <td>{{ $item->owner->name }}</td>
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
            </div>
        </div>
    </div>

@endsection
