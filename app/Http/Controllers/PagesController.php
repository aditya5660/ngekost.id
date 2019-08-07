<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

use App\Property;
use App\Amenities;
use App\Category;
use App\PostCategory;
use App\Message;
use App\Gallery;
use App\Comment;
use App\Rating;
use App\Post;
use App\User;
use App\Transaction;
use App\Setting;

use Carbon\Carbon;
use Auth;
use DB;

class PagesController extends Controller
{
    public function properties()
    {
        //$cities     = Property::select('city','city_slug')->distinct('city_slug')->get();
        $property = Property::latest()->paginate(12);

        $recentproperty = Property::latest()
                    ->take(1)->get();
        $amenities = Amenities::get();
        $category = Category::get();
        $settings       = Setting::first();

        return view('pages.properties.property', ['property'=>$property,'recentproperty'=>$recentproperty,'category'=>$category,'amenities'=>$amenities,'settings'=>$settings]);
    }


    public function propertieshow($slug)
    {
        $property = Property::with('gallery','user','category','province','regency','district')
                            ->where('slug', $slug)
                            ->first();


        $relatedproperty = Property::latest()
                    ->where('category_id', $property->category_id)
                    ->where('provinces', $property->provinces)
                    ->where('id', '!=' , $property->id)
                    ->take(2)->get();
        $recentproperty = Property::latest()
                    ->where('id', '!=' , $property->id)
                    ->take(5)->get();
        $amenities = Amenities::get();
        $category = Category::get();
        $settings = Setting::first();


       // $cities = Property::select('city','city_slug')->distinct('city_slug')->get();

        return view('pages.properties.single', ['category'=>$category,'property'=>$property,'relatedproperty'=>$relatedproperty,'recentproperty'=>$recentproperty,'amenities'=>$amenities,'settings'=>$settings]);
    }
    public function propertyCities($province_id){
        $property = Property::where('provinces',$province_id)->latest()->paginate(12);
        $recentproperty = Property::latest()
                    ->take(4)->get();
        $amenities = Amenities::get();
        $category = Category::get();
        $settings = Setting::first();
        return view('pages.properties.property', ['property'=>$property,'recentproperty'=>$recentproperty,'category'=>$category,'amenities'=>$amenities,'settings'=>$settings]);
    }



    // BLOG PAGE
    public function blog()
    {
        $month = request('month');
        $year  = request('year');

        $posts = Post::latest()
                                ->when($month, function ($query, $month) {
                                    return $query->whereMonth('created_at', Carbon::parse($month)->month);
                                })
                                ->when($year, function ($query, $year) {
                                    return $query->whereYear('created_at', $year);
                                })
                                ->where('status',1)
                                ->paginate(10);
        $postcategory = PostCategory::get();
        $recentpost = Post::latest()
                    ->take(4)->get();
        $settings = Setting::first();
        return view('pages.blog.index', ['posts'=>$posts,'postcategory'=>$postcategory,'recentpost'=>$recentpost,'settings'=>$settings]);
    }

    public function blogshow($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $recentpost = Post::latest()->take(4)->get();
        $property = Property::get();
        $recentproperty = Property::latest()
                    ->take(4)->get();

        $postcategory = PostCategory::get();

        $blogkey = 'blog-' . $post->id;
        if(!Session::has($blogkey)){
            $post->increment('view_count');
            Session::put($blogkey,1);
        }
        $settings = Setting::first();
        return view('pages.blog.single', ['post'=>$post, 'recentproperty'=>$recentproperty,'postcategory'=>$postcategory,'recentpost'=>$recentpost,'settings'=>$settings]);
    }

    // CONATCT PAGE
    public function about()
    {
        $settings = Setting::first();
        $propertycount  = Property::count();
        $usercount      = User::count();
        $transactioncount  = Transaction::count();
        return view('pages.about',['settings'=>$settings,'propertycount'=>$propertycount,'usercount'=>$usercount,'transactioncount'=>$transactioncount]);
    }




    // PROPERTY Bookings

    public function propertyBooking(Request $request)
    {
        $property = Property::find($request->property_id);

        if ($request->booking_range == 1 ) {
            $subtotal = $property->daily_price;
        }elseif($request->booking_range == 2 ){
            $subtotal = $property->monthly_price;
        }elseif($request->booking_range == 3 ){
            $subtotal = $property->yearly_price;
        };

        $transaction = new Transaction;
        $transaction->user_id = Auth::id();
        $transaction->property_id = $request->property_id;
        $transaction->owner_id = $property->user_id;
        $transaction->booking_range = $request->booking_range;
        $transaction->start_booking_date = $request->start_booking_date;
        $transaction->subtotal = $subtotal;
        $transaction->payments = $request->payments;
        $transaction->status = 0;

        $transaction->save();

        return redirect()->route('users.transaction.index');
    }

}
