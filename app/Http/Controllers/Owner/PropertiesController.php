<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DataTables;
use Illuminate\Support\Facades\DB;
use App\Property;
use App\PropertyImageGallery;
use Carbon\Carbon;
use Auth;
use File;

class PropertiesController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('properties')
                ->join('categories','properties.category_id','=','categories.id')
                ->select('properties.*','categories.category_name')
                ->where('user_id',Auth::user()->id)
                ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status',function($row){
                        if ($row->status === 0) {
                            return '<a href="javascript:void(0)" class="btn btn-outline-danger btn-xs">Pending</a>';
                        } elseif ($row->status === 1) {
                            return '<a href="javascript:void(0)" class="btn btn-outline-success btn-xs">Approved</a>';
                        }
                    })
                    ->addColumn('created_at',function($row){
                        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->diffForHumans();
                    })
                    ->addColumn('action', function($row){
                            $btn2 = '<a href="'.route('owner.properties.edit',$row->slug).'"  class="edit btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>';
                            $btn2 = $btn2.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-xs deleteBtn"><i class="fa fa-trash"></i></a>';
                            return $btn2;
                    })
                    ->rawColumns(['action','status','created_at'])
                    ->make(true);
        }

        return view('owner.properties.index',compact('data'));
    }

    public function create()
    {
        $province_name = DB::table('provinces')->get();
        $categories = DB::table('categories')->get();
        $amenities = DB::table('amenities')->get();
        return view('owner.properties.create',compact('categories','amenities','province_name'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|unique:properties|max:255',
            'category_id'   => 'required',
            'available_room' => 'required',
            'p_room_size' => 'required',
            'l_room_size' => 'required',
            'address'   => 'required',
            'provinces' => 'required',
            'regencies' => 'required',
            'districts' => 'required',
            'zipcode' => 'required',
            'image'     => 'required|image|mimes:jpeg,jpg,png',

        ]);

        $image = $request->file('image');
        $slug  = str_slug($request->title);
        $amenities = implode('//',$request->amenities);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('property')){
                Storage::disk('public')->makeDirectorypp('property');
            }
            $propertyimage = Image::make($image)->resize(750, 500)->save();
            Storage::disk('public')->put('property/'.$imagename, $propertyimage);

        }


        $property = new Property();
        $property->title                = $request->title;
        $property->slug                 = $slug;
        $property->category_id          = $request->category_id;
        $property->available_room       = $request->available_room;
        $property->p_room_size          = $request->p_room_size;
        $property->l_room_size          = $request->l_room_size;
        $property->daily_price          = $request->daily_price;
        $property->monthly_price        = $request->monthly_price;
        $property->yearly_price         = $request->yearly_price;
        $property->provinces            = $request->provinces;
        $property->address              = $request->address;
        $property->regencies            = $request->regencies;
        $property->districts            = $request->districts;
        $property->zipcode              = $request->zipcode;
        $property->location_latitude    = $request->location_latitude;
        $property->location_longitude   = $request->location_longitude;
        $property->image                = $imagename;
        $property->description          = $request->description;
        $property->title                = $request->title;
        $property->user_id              = Auth::id();
        $property->amenities_id         = $amenities;
        $property->featured             = 0;
        $property->status               = 0;

        $property->save();

        $gallary = $request->file('gallaryimage');

        if($gallary)
        {
            foreach($gallary as $images)
            {
                $currentDate = Carbon::now()->toDateString();
                $galimage['name'] = 'gallary-'.$currentDate.'-'.uniqid().'.'.$images->getClientOriginalExtension();
                $galimage['size'] = $images->getClientSize();
                $galimage['property_id'] = $property->id;

                if(!Storage::disk('public')->exists('property/gallery')){
                    Storage::disk('public')->makeDirectory('property/gallery');
                }
                $propertyimage = Image::make($images);
                    /* insert watermark at bottom-right corner with 10px offset */
                $propertyimage->resize(750, 500);
                $propertyimage->insert(public_path('logo/watermark-blue.png'), 'center');
                $propertyimage->save();
                Storage::disk('public')->put('property/gallery/'.$galimage['name'], $propertyimage);

                $property->gallery()->create($galimage);
            }
        }

        toastr()->success('message', 'Property created successfully.');
        return redirect()->route('owner.properties.index');
    }

    public function update(Request $request, $property)
    {
        $request->validate([
            'title'     => 'required|max:255',
            'category_id'   => 'required',
            'available_room' => 'required',
            'p_room_size' => 'required',
            'l_room_size' => 'required',
            'address'   => 'required',
            'provinces' => 'required',
            'regencies' => 'required',
            'districts' => 'required',
            'zipcode' => 'required',
            'image'     => 'image|mimes:jpeg,jpg,png',

        ]);


        $image = $request->file('image');
        $slug  = str_slug($request->title);
        $amenities = implode('//',$request->amenities);

        $property = Property::find($request->properties_id);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('property')){
                Storage::disk('public')->makeDirectory('property');
            }
            if(Storage::disk('public')->exists('property/'.$property->image)){
                Storage::disk('public')->delete('property/'.$property->image);
            }
            $propertyimage = Image::make($images);
            $propertyimage->resize(750, 500);
            $propertyimage->insert(public_path('logo/logo-blue.png'), 'center');
            $propertyimage->save();
            Storage::disk('public')->put('property/'.$imagename, $propertyimage);

        }else{
            $imagename = $property->image;
        }


        $property->title                = $request->title;
        $property->slug                 = $slug;
        $property->category_id          = $request->category_id;
        $property->available_room       = $request->available_room;
        $property->p_room_size          = $request->p_room_size;
        $property->l_room_size          = $request->l_room_size;
        $property->daily_price          = $request->daily_price;
        $property->monthly_price        = $request->monthly_price;
        $property->yearly_price         = $request->yearly_price;
        $property->provinces            = $request->provinces;
        $property->address              = $request->address;
        $property->regencies            = $request->regencies;
        $property->districts            = $request->districts;
        $property->zipcode              = $request->zipcode;
        $property->location_latitude    = $request->location_latitude;
        $property->location_longitude   = $request->location_longitude;
        $property->image                = $imagename;
        $property->status               = $property->status;
        $property->description          = $request->description;
        $property->title                = $request->title;
        $property->user_id              = Auth::id();
        $property->amenities_id         = $amenities;
        $property->featured             = 0;
        $property->status             = 0;

        $property->save();


        $gallary = $request->file('gallaryimage');
        if($gallary){
            foreach($gallary as $images){
                if(isset($images))
                {
                    $currentDate = Carbon::now()->toDateString();
                    $galimage['name'] = 'gallary-'.$currentDate.'-'.uniqid().'.'.$images->getClientOriginalExtension();
                    $galimage['size'] = $images->getClientSize();
                    $galimage['property_id'] = $property->id;

                    if(!Storage::disk('public')->exists('property/gallery')){
                        Storage::disk('public')->makeDirectory('property/gallery');
                    }
                    $propertyimage = Image::make($images);
                    /* insert watermark at bottom-right corner with 10px offset */
                    $propertyimage->resize(750, 500)->insert(public_path('logo/watermark-blue.png'), 'center');
                    $propertyimage->save();
                    Storage::disk('public')->put('property/gallery/'.$galimage['name'], $propertyimage);

                    $property->gallery()->create($galimage);
                }
            }
        }

        toastr()->success('message', 'Property updated successfully.');
        return redirect()->route('owner.properties.index');
    }
    public function show($id)
    {



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $province_name = DB::table('provinces')->get();
        $regency_name = DB::table('regencies')->get();
        $district_name = DB::table('districts')->get();
        $categories = DB::table('categories')->get();
        $amenities = DB::table('amenities')->get();
        $property = DB::table('properties')->where('slug',$slug)->first();
        $gallery = DB::table('property_image_galleries')->where('property_id',$property->id)->get();
        $chxamenities = explode('//',$property->amenities_id);

        return view('owner.properties.edit', compact('categories','amenities','property','chxamenities','province_name','regency_name','district_name','gallery'));
    }
    public function destroy($id)
    {
        $property = Property::find($id);

        if(Storage::disk('public')->exists('property/'.$property->image)){
            Storage::disk('public')->delete('property/'.$property->image);
        }

        $property->delete();

        $galleries = $property->gallery;
        if($galleries)
        {
            foreach ($galleries as $key => $gallery) {
                if(Storage::disk('public')->exists('property/gallery/'.$gallery->name)){
                    Storage::disk('public')->delete('property/gallery/'.$gallery->name);
                }
                PropertyImageGallery::destroy($gallery->id);
            }
        }

        return response()->json(['success'=>'Properties deleted successfully.']);
    }
    public function provinceForRegencies($province_id)
    {
        $province_id = urldecode($province_id);
        $regencies = DB::table("regencies")
                    ->where("province_id",$province_id)
                    ->get();
        return json_encode($regencies);
    }

    public function regenciesForDistrict($regencies_id)
    {
        $regencies_id = urldecode($regencies_id);
        $districts = DB::table("districts")
                    ->where("regency_id",$regencies_id)
                    ->get();
        return json_encode($districts);
    }
    // DELETE GALERY IMAGE ON EDIT
    public function galleryImageDelete(Request $request){

        $gallaryimg = PropertyImageGallery::find($request->id)->delete();

        if(Storage::disk('public')->exists('property/gallery/'.$request->image)){
            Storage::disk('public')->delete('property/gallery/'.$request->image);
        }

        if($request->ajax()){

            return response()->json(['msg' => true]);
        }
    }

}
