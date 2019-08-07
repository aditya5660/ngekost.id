<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Property;
use App\User;
use App\Transaction;
use App\Post;
use Carbon\Carbon;
use App\Setting;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DashboardController extends Controller
{
    public function index()
    {
        $transactioncount = Transaction::count();
        $propertycount = Property::count();
        $usercount     = User::count();
        $postcount     = Post::count();

        $properties    = Property::latest()->with('user','category')->take(5)->get();
        $users         = User::with('role')->latest()->take(5)->get();
        $transaction   = Transaction::with('property','user')->latest()->take(5)->get();
        $posts         = Post::latest()->take(5)->get();

        return view('admin.index',['propertycount'=>$propertycount,'properties'=>$properties,'users'=>$users,'usercount'=>$usercount,'transaction'=>$transaction,'transactioncount'=>$transactioncount,'posts'=>$posts,'postcount'=>$postcount]);
    }
    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', ['user'=>$user]);
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
    public function setting()
    {
        $settings = Setting::first();
        return view('admin.setting', compact('settings'));
    }
    public function settingStore(Request $request)
    {

        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required',
            'phone'     => 'required',
            'address'   => 'required',
            'footer'    => 'required',
            'aboutus'   => 'required',
            'facebook'  => 'required|url',
            'twitter'   => 'required|url',
            'linkedin'  => 'required|url',
        ]);

        Setting::updateOrCreate(
            [ 'id'       => 1 ],
            [
              'name'     => $request->name,
              'email'    => $request->email,
              'phone'    => $request->phone,
              'address'  => $request->address,
              'footer'   => $request->footer,
              'aboutus'  => $request->aboutus,
              'facebook' => $request->facebook,
              'twitter'  => $request->twitter,
              'linkedin' => $request->linkedin
            ]
        );

        $settings = Setting::first();

        toastr()->success('message', 'Updated successfully.');
        return back();
    }
}
