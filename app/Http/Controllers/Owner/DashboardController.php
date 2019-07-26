<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Auth;
use App\User;
use Carbon\Carbon;
use App\Property;
use App\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $transactioncount = Transaction::where('owner_id',Auth::user()->id)->count();
        $propertycount = Property::where('user_id',Auth::user()->id)->count();
        $pendingpropertycount = Property::where('user_id',Auth::user()->id)->where('status',0)->count();
        $property    = Property::latest()->with('user','category')->where('user_id',Auth::user()->id)->take(5)->get();
        $transaction   = Transaction::with('property','user')->latest()->where('user_id',Auth::user()->id)->take(5)->get();
        return view('owner.index',['property'=> $property ,'transaction'=>$transaction,'transactioncount'=>$transactioncount,'propertycount'=>$propertycount,'pendingpropertycount'=>$pendingpropertycount]);
    }
    public function profile()
    {
        $user = Auth::user();
        return view('owner.profile', compact('user'));
    }
    function profileUpdate(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'username'      => 'required',
            'phone'      => 'required',
            'email'     => 'required|email',
            'image'     => 'image|mimes:jpeg,jpg,png',
            'about'     => 'max:250'
        ]);

        $user = User::find(Auth::id());

        $image = $request->file('image');
        $slug  = str_slug($request->name);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-agent-'.Auth::id().'-'.$currentDate.'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('users')){
                Storage::disk('public')->makeDirectory('users');
            }
            if(Storage::disk('public')->exists('users/'.$user->image) && $user->image != 'default.png' ){
                Storage::disk('public')->delete('users/'.$user->image);
            }
            $userimage = Image::make($image)->save();
            Storage::disk('public')->put('users/'.$imagename, $userimage);
        } else {
            $imagename = $request->oldimage;
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->image = $imagename;
        $user->about = $request->about;

        $user->save();
        toastr()->success('Profile Update Success.');
        return back();
    }
    public function changePasswordUpdate(Request $request)
    {
        if (!(Hash::check($request->get('currentpassword'), Auth::user()->password))) {

            toastr()->error('message', 'Your current password does not matches with the password you provided! Please try again.');
            return redirect()->back();
        }
        if(strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0){

            toastr()->error('message', 'New Password cannot be same as your current password! Please choose a different password.');
            return redirect()->back();
        }
        if(!(strcmp($request->get('newpassword'), $request->get('newpassword_confirmation'))) == 0){
            //New password and confirm password are not same
            toastr()->error('New Password should be same as your confirmed password. Please retype new password.');
            return redirect()->back();
    }

        $this->validate($request, [
            'currentpassword' => 'required',
            'newpassword' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('newpassword'));
        $user->save();

        toastr()->success('message', 'Password changed successfully.');
        return redirect()->back();
    }

}
