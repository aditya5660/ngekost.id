<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\PostCategory;

class PostCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PostCategory::latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()

                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBtn"><i class="fa fa-pencil"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBtn"><i class="fa fa-trash"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.post_category',compact('category'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|max:255',
        ]);
        $slug  = str_slug($request->name);
        PostCategory::updateOrCreate(['id' => $request->category_id],
                ['name' => $request->name ,
                    'slug' => $slug ]);
        // return session()->set('success','Item created successfully.');
        return response()->json(['success'=>'Category saved successfully.']);

    }
    public function edit($id)
    {
        $categories = PostCategory::find($id);
        return response()->json($categories);
    }
    public function destroy($id)
    {
        PostCategory::find($id)->delete();

        return response()->json(['success'=>'Category deleted successfully.']);
    }
}
