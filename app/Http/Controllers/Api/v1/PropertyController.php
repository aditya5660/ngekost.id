<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Property;
use App\PropertyImageGallery;

class PropertyController extends Controller
{
    public function recentproperty()
    {
        $data = Property::latest()->get();
        return response()->json($data, 200);
    }
    public function detail($id)
    {
        $data = Property::where('id' ,$id)->with('category','user','gallery')->get();
        return response()->json($data, 200);
    }
    public function propertyByCategory($id)
    {
        $data = Property::latest()->where('category_id',$id)->get();
        return response()->json($data, 200);
    }
}
