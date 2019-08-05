<?php

namespace App\Http\Controllers\Users;

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
        $transaction = Transaction::latest()->where('user_id',Auth::user()->id)->with('property')->get();
        // return view('user.transaction.index', ['transaction'=>$transaction ]);
        return view('user.transaction.index', ['transaction' => $transaction ]);
    }
    public function invoice($id)
    {
        $data = Transaction::find($id)->first();
        $users = User::find($data->user_id)->first();
        $property = Property::find($data->property_id)->with('province','regency','district','user')->first();
        return view('user.transaction.invoice',['data'=> $data , 'users'=> $users ,'property'=>$property ]);
    }
    public function destroy($id)
    {
        Transaction::find($id)->delete();
        return response()->json(['success'=>'Transaction Delete successfully.']);
    }
}
