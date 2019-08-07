<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::latest()->get();

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
        return view('admin.categories',['category'=>$category]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_name'  => 'required|unique:categories|max:255',
        ]);
        $slug  = str_slug($request->category_name);
        Category::updateOrCreate(['id' => $request->category_id],
                ['category_name' => $request->category_name ,
                    'slug' => $slug ]);
        // return session()->set('success','Item created successfully.');
        return response()->json(['success'=>'Category saved successfully.']);

    }
    public function edit($id)
    {
        $categories = Category::find($id);
        return response()->json($categories);
    }
    public function destroy($id)
    {
        Category::find($id)->delete();

        return response()->json(['success'=>'Category deleted successfully.']);
    }
}
