<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Support\Facades\DB;
use Carbon;
use App\User;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('users')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('role',function($row){
                        if ($row->role_id === 3) {
                            return '<a href="javascript:void(0)" class="btn btn-danger btn-xs">Users</a>';
                        } elseif ($row->role_id === 1) {
                            return '<a href="javascript:void(0)" class="btn btn-primary btn-xs">Admin</a>';
                        } elseif ($row->role_id === 2) {
                            return '<a href="javascript:void(0)" class="btn btn-success btn-xs">Owner</a>';
                        }
                    })
                    ->addColumn('verified',function($row){
                        if ($row->verified === 0) {
                            return '<a href="javascript:void(0)" class="btn btn-outline-danger btn-xs">Pending</a>';
                        } elseif ($row->verified === 1) {
                            return '<a href="javascript:void(0)" class="btn btn-outline-success btn-xs">Approved</a>';
                        }
                    })
                    ->addColumn('created_at',function($row){
                        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->diffForHumans();
                    })
                    ->addColumn('action', function($row){
                            if ($row->verified === 0) {
                                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-verified="'.$row->verified.'" data-original-title="Active" class="active btn btn-success btn-xs activeBtn"><i class="fa fa-check"></i></a>';
                            } elseif ($row->verified === 1) {
                                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-verified="'.$row->verified.'" data-original-title="Active" class="active btn btn-warning btn-xs activeBtn"><i class="fa fa-close"> </i></a>';
                            }
                            return $btn;
                    })
                    ->rawColumns(['role','action','verified','created_at'])
                    ->make(true);
        }

        return view('admin.user',['data'=>$data]);
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
        $verified = $request->verified;
        // Kost::updateOrCreate(['id' => $request->id],
        //         ['status' => !$request->status]);
        DB::table('users')
            ->where('id', $id)
            ->update(['verified' => !$verified ]);
        return response()->json(['success'=>'Kost saved successfully.']);
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

}
