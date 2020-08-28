<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index', 'show']]);
    }
    
       
    public function index()
    {
        $posts= Post::orderBy('created_at','desc')->paginate(6);
        return view("post.index",compact('posts'));
    }


    public function create()
    {
        return view("post.create");
    }


    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999',
        ]);
           
         if($request->hasFile('cover_image')){
           $fullname = $request->file('cover_image')->getClientOriginalName();
           $filename = pathinfo($fullname, PATHINFO_FILENAME);         
           $extension = $request->file('cover_image')->getClientOriginalExtension();
           $fileNameToStore = $filename.'_'.time().'.'.$extension;
           $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
       }  
       
       else{
           $fileNameToStore = 'noimage.jpg';
       }  
        
       
       
       $post = new Post();
       $post->title = $request->input('title');
       $post->body = $request->input('body');
       $post->user_id = auth()->user()->id;
       $post->cover_image = $fileNameToStore;
       $post->save();
       
       return redirect('/post')->with('success','Post Created Successfully');
    }


    public function show($id)
    {
         $posts= Post::find($id);
         return view("post.show",compact('posts'));
    }


    public function edit($id)
    {
        $posts= Post::find($id);
       if(Auth()->user()->id == $posts->user->id){
           return view("post.edit",compact('posts'));
        }
        else{
           return redirect("/post")->with("error" , "unauthorized");
        }
    }



    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999',
        ]);
       
       if($request->hasFile('cover_image')){
           $fullname = $request->file('cover_image')->getClientOriginalName();
           $filename = pathinfo($fullname, PATHINFO_FILENAME);         
           $extension = $request->file('cover_image')->getClientOriginalExtension();
           $fileNameToStore = $filename.'_'.time().'.'.$extension;
           $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
       }  

         
       $post = Post::find($id);
       $post->title = $request->input('title');
       $post->body = $request->input('body');
       $post->user_id = auth()->user()->id;
       
       if($request->hasFile('cover_image')){
        $post->cover_image = $fileNameToStore;
       }
       $post->save();
       
       return redirect('/post')->with('success','Post Updated Successfully');
    }


    public function destroy($id)
    {
       $post = Post::find($id);
       if($post->cover_image !='noimage.jpg'){
           Storage::delete('public/cover_images/'.$post->cover_image);
       }
       $post->delete();
       
       return redirect('/post')->with('success','Post Removed Successfully');
    }
}
