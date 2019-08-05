

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('frontend_assets/css/skins/default.css')}}">
</head>
<body>
<div class="container">


    <div class="submit-address dashboard-list">
        <form method="GET">
            <h4>Invoice</h4>
            <div class="row pad-20">
                <div class="col-lg-12">
                    <div class="invoice">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 invoice-mb-30">
                                <a href="index.html" class="logo">
                                    <img src="{{asset('logo/logo-blue.png')}}" class="cm-logo" alt="black-logo">
                                </a>
                            </div>
                            <div class="col-md-6 col-sm-6 invoice-mb-30">
                                <div class="order">Order #INV000{{$data->id}}</div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <address class="address-info">
                                    <p class="strong">Property Info</p>
                                    <p>{{$property->title}}</p>
                                    <p>{{$property->address}}</p>
                                    <p>{{$property->district->name}}</p>
                                    <p>{{$property->regency->name}}</p>
                                    <p>{{$property->province->name}}</p>

                                </address>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <address class="address-info text-right">
                                    <p class="strong">Owner Info</p>
                                    <p>{{$property->user->name}}</p>
                                    <p>{{$property->user->email}}</p>
                                    <p>{{$property->user->phone}}</p>
                                </address>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <address class="address-info text-right">
                                    <p class="strong">Invoice Date:</p>
                                    <p>{{$data->created_at}}</p>
                                    <p class="strong">Payment Status:</p>
                                    <p>{{$data->status}}</p>
                                </address>
                            </div>
                        </div>
                        @php
                        if ($data->booking_range == 1) {
                            $booking_range = 'Harian';
                        } elseif($data->booking_range == 2) {
                            $booking_range = 'Bulanan';

                        } elseif($data->booking_range == 3) {
                            $booking_range = 'Tahunan';
                        }

                        @endphp
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead class="bg-active">
                                        <tr>
                                            <td><strong>#</strong></td>
                                            <td><strong>Item</strong></td>
                                            <td class="text-center"><strong>Booking Range</strong></td>
                                            <td class="text-center"><strong>Price</strong></td>
                                            <td class="text-right"><strong>Totals</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><strong>{{$data->id}}</strong></td>
                                            <td>{{$property->id}} - {{$property->title}}</td>
                                            <td class="text-center">{{$booking_range}}</td>
                                            <td class="text-center">{{$data->amount}}</td>
                                            <td class="text-right">{{$data->amount}}</td>
                                        </tr>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center"><strong>Total</strong></td>
                                            <td class="no-line text-right">{{$data->amount}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="font-size:10px;color:dimgray"><i> This Invoice Autogenerated from ngekost.id & Midtrans Payments System , No Signature Needed</i></h4>
        </form>
    </div>

    <a class="btn btn-xs btn-primary" href="{{route('admin.transaction.index')}}">Back To Dashboard</a>
</div>
</body>
</html>
