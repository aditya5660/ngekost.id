<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Property;
use App\Amenities;
use App\Category;
use App\Slider;
use App\User;
use App\Transaction;

use App\Post;
use App\Setting;
use DB;
use Carbon\Carbon as Carbon;

class FrontpageController extends Controller
{

    public function index()
    {

        $sliders        = Slider::latest()->get();
        $amenities      = Amenities::get();
        $properties     = Property::latest()->where('status',1)->with('user','category')->take(6)->get();
        $posts          = Post::latest()->where('status',1)->take(6)->get();
        $settings       = Setting::first();
        $propertycount  = Property::count();
        $usercount      = User::count();
        $transactioncount  = Transaction::count();
        return view('frontend.index', ['sliders'=>$sliders,'properties'=>$properties,'posts'=>$posts,'amenities'=>$amenities,'settings'=>$settings,'propertycount'=>$propertycount,'usercount'=>$usercount,'transactioncount'=>$transactioncount]);
    }

    public function search(Request $request)
    {
        $title     = strtolower($request->title);
        $amenities = Amenities::get();
        $category = Category::get();
        $recentproperty = Property::latest()
                    ->take(4)->get();
        $settings       = Setting::first();
        $property = Property::latest()
                                ->when($title, function ($query, $title) {
                                    return $query->where('title', 'LIKE', '%'.$title.'%')->orWhere('address','LIKE','%'.$title.'%');
                                })
                                ->paginate(10);
        return view('pages.search', ['property'=>$property,'amenities'=>$amenities,'recentproperty'=>$recentproperty,'category'=>$category,'settings'=>$settings]);
    }
    public function autocomplete(Request $request)
    {
        $title = $request->get('term');
        $result = Property::where('title', 'LIKE', '%'.$title.'%')->orWhere('address','LIKE','%'.$title.'%')->get();
        return response()->json($result);
    }

}
