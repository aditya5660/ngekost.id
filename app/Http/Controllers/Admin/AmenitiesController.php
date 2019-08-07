<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Amenities;

class AmenitiesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $amenities = Amenities::latest()->get();
            return Datatables::of($amenities)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBtn"><i class="fa fa-pencil"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBtn"><i class="fa fa-trash"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.amenities');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|max:255',
        ]);
        Amenities::updateOrCreate(['id' => $request->amenities_id],
                ['name' => $request->name,
                'icon'=> $request->icon]);
        return response()->json(['success'=>'Amenities saved successfully.']);

    }
    public function edit($id)
    {
        $amenities = Amenities::find($id);
        return response()->json($amenities);
    }
    public function destroy($id)
    {
        Amenities::find($id)->delete();
        return response()->json(['success'=>'Amenities deleted successfully.']);
    }
}
