<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\PostCategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Toastr;
use Auth;
use DataTables;

class PostController extends Controller
{

    public function index(Request $request)
    {


        $posts = Post::latest()->get();

        return view('admin.posts.index',compact('posts'));
    }


    public function create()
    {
        $categories = PostCategory::all();
        return view('admin.posts.create',compact('categories'));

    }


    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|unique:posts|max:255',
            'image'     => 'required|mimes:jpeg,jpg,png',
            'categories'=> 'required',
            'body'      => 'required'
        ]);

        $image = $request->file('image');
        $slug  = str_slug($request->title);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('posts')){
                Storage::disk('public')->makeDirectory('posts');
            }
            $postimage = Image::make($image)->resize(1600, 980)->save();
            Storage::disk('public')->put('posts/'.$imagename, $postimage);

        }else{
            $imagename = 'default.png';
        }

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imagename;
        $post->body = $request->body;
        $post->status = true;
        $post->is_approved = true;
        $post->category_id = $request->categories;
        $post->save();


        toastr()->success('message', 'Post created successfully.');
        return redirect()->route('admin.posts.index');

    }


    public function show(Post $post)
    {
        $post = Post::find($post->id);

        return view('admin.posts.show',compact('post'));
    }


    public function edit(Post $post)
    {
        $categories = PostCategory::all();
        $post = Post::find($post->id);

        return view('admin.posts.edit',compact('categories','post'));
    }


    public function update(Request $request, $post)
    {
        $request->validate([
            'title'     => 'required|max:255',
            'image'     => 'mimes:jpeg,jpg,png',
            'categories'=> 'required',
            'body'      => 'required'
        ]);

        $image = $request->file('image');
        $slug  = str_slug($request->title);

        $post = Post::find($post);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('posts')){
                Storage::disk('public')->makeDirectory('posts');
            }
            if(Storage::disk('public')->exists('posts/'.$post->image)){
                Storage::disk('public')->delete('posts/'.$post->image);
            }
            $postimage = Image::make($image)->resize(1600, 980)->save();
            Storage::disk('public')->put('posts/'.$imagename, $postimage);

        }else{
            $imagename = $post->image;
        }

        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->slug = $slug;
        $post->image = $imagename;
        $post->body = $request->body;
        $post->status = true;
        $post->is_approved = true;
        $post->save();


        toastr()->success('message', 'Post updated successfully.');
        return redirect()->route('admin.posts.index');
    }


    public function destroy(Post $post)
    {
        $post = Post::find($post->id);

        if(Storage::disk('public')->exists('posts/'.$post->image)){
            Storage::disk('public')->delete('posts/'.$post->image);
        }

        $post->delete();


        toastr()->success('message', 'Post deleted successfully.');
        return back();
    }
}
