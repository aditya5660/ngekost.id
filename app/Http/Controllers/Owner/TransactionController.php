<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\User;
use App\Property;
use DataTables;
use Illuminate\Support\Facades\DB;
use Auth;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Transaction::latest()->with('property','user')->where('status','!=','pending')->where('status','!=',1)->where('owner_id',Auth::user()->id)->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('booking_range',function($row){
                        if ($row->booking_range == 1) {
                            return '<a href="javascript:void(0)" style="font-size:12px;" class="btn btn-outline-success btn-xs">Harian</a>';
                        } elseif ($row->booking_range == 2) {
                            return '<a href="javascript:void(0)" style="font-size:12px;" class="btn btn-outline-success btn-xs">Bulanan</a>';
                        } elseif ($row->booking_range == 3) {
                            return '<a href="javascript:void(0)" style="font-size:12px;" class="btn btn-outline-success btn-xs">Tahunan</a>';
                        }
                    })
                    ->addColumn('status',function($row){
                        if ($row->status === 0) {
                            return '<a href="javascript:void(0)" style="font-size:12px;" class="btn btn-outline-danger btn-xs">Belum Dibayar</a>';
                        } elseif ($row->status === 1) {
                            return '<a href="javascript:void(0)" style="font-size:12px;" class="btn btn-outline-danger btn-xs">Menunggu Konfirmasi Pembayaran</a>';
                        } elseif ($row->status === 2) {
                            return '<a href="javascript:void(0)" style="font-size:12px;" class="btn btn-outline-success btn-xs">Pembayaran Diterima</a>';
                        } elseif ($row->status === 3) {
                            return '<a href="javascript:void(0)" style="font-size:12px;" class="btn btn-outline-success btn-xs">Approved by Property Owner</a>';
                        } elseif ($row->status === 4) {
                            return '<a href="javascript:void(0)" style="font-size:12px;" class="btn btn-outline-success btn-xs">Canceled by Property Owner</a>';
                        } elseif ($row->status === 5) {
                            return '<a href="javascript:void(0)" style="font-size:12px;" class="btn btn-outline-success btn-xs">Transaksi Selesai</a>';
                        } elseif ($row->status === 6) {
                            return '<a href="javascript:void(0)" style="font-size:12px;" class="btn btn-outline-success btn-xs">Canceled</a>';
                        }
                    })
                    ->addColumn('action', function($row){
                        $btn = ' <a  style="font-size:12px;" data-id="'.$row->id.'" data-status="3"  data-original-title="Invoice" class="btn btn-success btn-xs acceptBtn">Terima</a>';
                        $btn = $btn. ' <a href="javascript:void(0)" style="font-size:12px;" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-xs deleteBtn">Tolak</a>';
                        $btn = $btn. ' <a  style="font-size:12px;" href="'.route('owner.transaction.invoice',$row->id).'"  data-original-title="Invoice" class="btn btn-primary btn-xs invBtn"><i class="fa fa-print"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action','status','booking_range'])
                    ->make(true);
        }
        return view('owner.transaction.index', ['data'=>$data]);
    }
    public function invoice($id)
    {
        $data = Transaction::find($id)->first();
        $users = User::find($data->user_id)->first();
        $property = Property::find($data->property_id)->with('province','regency','district','user')->first();
        return view('owner.transaction.invoice',['data'=> $data , 'users'=> $users ,'property'=>$property ]);
    }
    public function update(Request $request,$id)
    {
        $transaction = Transaction::find($id);
        $transaction->status = 3;
        $transaction->save();
        return response()->json(['success'=>'Transaction accept successfully.']);
    }
    public function acceptPayments($id)
    {
        $transaction = Transaction::find($id);
        $transaction->status = 3;
        $transaction->save();
        return response()->json(['success'=>'Transaction canceled successfully.']);
    }
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $transaction->status = 4;
        $transaction->save();
        return response()->json(['success'=>'Transaction canceled successfully.']);
    }
}
