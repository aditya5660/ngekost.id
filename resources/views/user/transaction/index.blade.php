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

                <table class="table table-bordered table-striped data-table display" id="datatable" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Property</th>
                            <th>Start Booking</th>
                            <th>Booking Range</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaction as $item)
                        {{-- @php

                        @endphp --}}
                        <tr>
                            <td><code>{{$item->id}}</code></td>
                            <td>{{$item->property->title}}</td>
                            <td>{{$item->start_booking_date}}</td>
                            <td>
                                @if($item->booking_range == 1)
                                    <a href="javascript:void(0)" style="font-size:12px;" class="btn btn-outline-success btn-xs">Harian</a>
                                @elseif ($item->booking_range == 2)
                                    <a href="javascript:void(0)" style="font-size:12px;" class="btn btn-outline-success btn-xs">Bulanan</a>
                                @elseif ($item->booking_range == 3) {
                                    <a href="javascript:void(0)" style="font-size:12px;" class="btn btn-outline-success btn-xs">Tahunan</a>
                                @endif
                            </td>
                            <td>Rp. {{number_format($item->amount)}}</td>
                            <td>{{ ucfirst($item->status) }}</td>
                            <td >
                                @if ($item->status == 'pending')
                                <button class="btn btn-xs btn-success "  style="font-size:12px;" onclick="snap.pay('{{ $item->snap_token }}')"> Complete Payment</button>
                                @endif
                                <a  style="font-size:12px;" href="{{route('users.transaction.invoice',$item->id)}}"  data-original-title="Invoice" class="btn btn-primary btn-xs invBtn"><i class="fa fa-print"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>
        </div>
@endsection


@push('script')
<script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
<script>
$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>
@endpush
