<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use DataTables;
use App\Slider;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Slider::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image',function($row)
                    {
                        if(Storage::disk('public')->exists('slider/'.$row->image)){
                            return '<img src="'.Storage::url('slider/'.$row->image).'" alt="" sizes="200px" srcset="" width="160">';
                        }
                    })
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.route('admin.sliders.edit',$row->id).'" class="edit btn btn-primary btn-sm "><i class="fa fa-pencil"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBtn"><i class="fa fa-trash"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        return view('admin.sliders.index',compact('slider'));
    }
    public function create()
    {
        return view('admin.sliders.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
        ]);

        $image = $request->file('image');

        $slug  = str_slug($request->title);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('slider')){
                Storage::disk('public')->makeDirectory('slider');
            }
            $slider = Image::make($image)->resize(2560,1440)->save();
            Storage::disk('public')->put('slider/'.$imagename, $slider);
        }else{
            $imagename = 'default.png';
        }

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = $imagename;
        $slider->save();

        toastr()->success('message', 'Slider created successfully.');
        return redirect()->route('admin.sliders.index');

    }
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.sliders.edit',compact('slider'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);

        $image = $request->file('image');

        $slug  = str_slug($request->title);
        $slider = Slider::find($id);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('slider')){
                Storage::disk('public')->makeDirectory('slider');
            }
            if(Storage::disk('public')->exists('slider/'.$slider->image)){
                Storage::disk('public')->delete('slider/'.$slider->image);
            }
            $sliderimg = Image::make($image)->resize(2560,1440)->save();
            Storage::disk('public')->put('slider/'.$imagename, $sliderimg);
        }else{
            $imagename = $request->oldimage;
        }

        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = $imagename;
        $slider->save();

        toastr()->success('message', 'Slider updated successfully.');
        return redirect()->route('admin.sliders.index');

    }
    public function destroy($id)
    {
        $slider = Slider::find($id);
        if(Storage::disk('public')->exists('slider/'.$slider->image)){
            Storage::disk('public')->delete('slider/'.$slider->image);
        }

        $slider->delete();

        return response()->json(['success'=>'Category deleted successfully.']);
    }

}
