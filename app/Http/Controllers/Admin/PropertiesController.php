<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Support\Facades\DB;
use App\Kost;
use App\Category;
use Carbon;




class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('properties')
                ->join('categories','properties.category_id','=','categories.id')
                ->select('properties.*','categories.category_name')
                ->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('featured',function($row){
                        if ($row->featured === 0) {
                            return '<a href="javascript:void(0)" class="btn btn-outline-danger btn-xs">UNFEATURED</a>';
                        } elseif ($row->featured === 1) {
                            return '<a href="javascript:void(0)" class="btn btn-outline-primary btn-xs">FEATURED</a>';
                        }
                    })
                    ->addColumn('status',function($row){
                        if ($row->status === 0) {
                            return '<a href="javascript:void(0)" class="btn btn-outline-danger btn-xs">NonActive</a>';
                        } elseif ($row->status === 1) {
                            return '<a href="javascript:void(0)" class="btn btn-outline-primary btn-xs">Active</a>';
                        }
                    })
                    ->addColumn('created_at',function($row){
                        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->diffForHumans();
                    })
                    ->addColumn('action', function($row){
                            if ($row->status === 0) {
                                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-status="'.$row->status.'" data-original-title="Active" class="active btn btn-success btn-xs activeBtn"><i class="fa fa-check"></i></a>';
                            } elseif ($row->status === 1) {
                                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-status="'.$row->status.'" data-original-title="Active" class="active btn btn-warning btn-xs activeBtn"><i class="fa fa-close"></i></a>';
                            }
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-xs deleteBtn"><i class="fa fa-trash"></i></a>';
                            return $btn;
                    })
                    ->rawColumns(['action','status','featured','created_at'])
                    ->make(true);
        }
        return view('admin.properties',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        // Kost::updateOrCreate(['id' => $request->id],
        //         ['status' => !$request->status]);
        DB::table('properties')
            ->where('id', $id)
            ->update(['status' => !$status ]);
        return response()->json(['success'=>'proeprties Update successfully.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('properties')->where('id', $id)->delete();
        return response()->json(['success'=>'proeprties deleted successfully.']);
    }
}
