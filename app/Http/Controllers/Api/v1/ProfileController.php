<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class ProfileController extends Controller
{
    public function index($id)
    {
        $data = User::where('id',$id)->get();
        return response()->json($data, 200);
    }
    public function update(Request $request)
    {
        $profile = User::find($request->id);
        $profile->name = $request->name;
        $profile->username = $request->username;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->about = $request->about;
        $profile->save();
        return response()->json('Success', 200);
        
    }

}
