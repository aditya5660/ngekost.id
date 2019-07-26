<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Auth;
use App\User;
use App\FavoritedProperties;
use App\Transaction;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DashboardController extends Controller
{
    public function index()
    {
        $favoritedpropertycount = FavoritedProperties::where('user_id',Auth::user()->id)->count();
        $favoritedproperty    = FavoritedProperties::latest()->with('property')->where('user_id',Auth::user()->id)->take(5)->get();
        $transaction   = Transaction::with('property','user')->where('user_id',Auth::user()->id)->latest()->take(5)->get();
        $transactioncount   = Transaction::where('user_id',Auth::user()->id)->count();
        return view('user.index',['transaction'=>$transaction,'favoritedproperty'=>$favoritedproperty,'transactioncount'=>$transactioncount,'favoritedpropertycount'=>$favoritedpropertycount]);
    }
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
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
            $imagename = $slug.'-users-'.Auth::id().'-'.$currentDate.'.'.$image->getClientOriginalExtension();

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
