<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Property;
use DB;
use Auth;
use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;

class BookingController extends Controller
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;

        // Set midtrans configuration
        Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
        Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
        Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
        Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
    }
    public function submitBooking()
    {


        // $transaction = new Transaction;
        // $transaction->user_id = Auth::id();
        // $transaction->property_id = $request->property_id;
        // $transaction->owner_id = $property->user_id;
        // $transaction->booking_range = $request->booking_range;
        // $transaction->start_booking_date = $request->start_booking_date;
        // $transaction->subtotal = $subtotal;
        // $transaction->payments = $request->payments;
        // $transaction->status = 0;

        // $transaction->save();

        DB::transaction(function(){
            // Save donasi ke database
            $property = Property::find($this->request->property_id);

            if ($this->request->booking_range == 1 ) {
                $amount = $property->daily_price;
            }elseif($this->request->booking_range == 2 ){
                $amount = $property->monthly_price;
            }elseif($this->request->booking_range == 3 ){
                $amount = $property->yearly_price;
            };
            // dd($amount);
            $transaction = Transaction::create([
                'user_id' => Auth::id(),
                'property_id' => $this->request->property_id,
                'owner_id' => $property->user_id,
                'booking_range' => $this->request->booking_range,
                'start_booking_date' => $this->request->start_booking_date,
                'amount' => $amount,
            ]);

            // Buat transaksi ke midtrans kemudian save snap tokennya.
            $payload = [
                'transaction_details' => [
                    'order_id'      => $transaction->id,
                    'gross_amount'  => $transaction->amount,
                ],
                'customer_details' => [
                    'first_name'    => $property->user->name,
                    'email'         => $property->user->email,
                    'phone'         => $property->user->phone,
                    // 'address'       => '',
                ],
                'item_details' => [
                    [
                        'id'       => $transaction->id,
                        'price'    => $transaction->amount,
                        'quantity' => 1,
                        'name'     => $property->title
                    ]
                ]
            ];
            $snapToken = Veritrans_Snap::getSnapToken($payload);
            $transaction->snap_token = $snapToken;
            $transaction->save();

            // Beri response snap token
            $this->response['snap_token'] = $snapToken;
        });

        return response()->json($this->response);

    }
    public function notificationHandler(Request $request)
    {
        $notif = new Veritrans_Notification();
        \DB::transaction(function() use($notif) {

          $transaction = $notif->transaction_status;
          $type = $notif->payment_type;
          $orderId = $notif->order_id;
          $fraud = $notif->fraud_status;
          $trx = Transaction::findOrFail($orderId);

          if ($transaction == 'capture') {

            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {

              if($fraud == 'challenge') {
                // TODO set payment status in merchant's database to 'Challenge by FDS'
                // TODO merchant should decide whether this transaction is authorized or not in MAP
                // $donation->addUpdate("Transaction order_id: " . $orderId ." is challenged by FDS");
                $trx->setPending();
              } else {
                // TODO set payment status in merchant's database to 'Success'
                // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully captured using " . $type);
                $trx->setSuccess();
              }

            }

          } elseif ($transaction == 'settlement') {

            // TODO set payment status in merchant's database to 'Settlement'
            // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully transfered using " . $type);
            $trx->setSuccess();

          } elseif($transaction == 'pending'){

            // TODO set payment status in merchant's database to 'Pending'
            // $donation->addUpdate("Waiting customer to finish transaction order_id: " . $orderId . " using " . $type);
            $trx->setPending();

          } elseif ($transaction == 'deny') {

            // TODO set payment status in merchant's database to 'Failed'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is Failed.");
            $trx->setFailed();

          } elseif ($transaction == 'expire') {

            // TODO set payment status in merchant's database to 'expire'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.");
            $trx->setExpired();

          } elseif ($transaction == 'cancel') {

            // TODO set payment status in merchant's database to 'Failed'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is canceled.");
            $trx->setFailed();

          }
        });

        return;
    }
}
