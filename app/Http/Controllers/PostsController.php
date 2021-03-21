<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{
    /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth', ['except' => ['index', 'show']]);
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = Post::orderBy('id', 'desc')->paginate(2);
        // $posts = Post::orderBy('id', 'desc')->get();
        // return Post::where('id', '>', '1')->get();
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')){
            //Get Filename with Extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just Filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just Ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // insert data on post table
        $posts = new Post;
        $posts->title   = $request->input('title');
        $posts->body    = $request->input('body');
        $posts->user_id = auth()->user()->id;
        $posts->cover_image = $fileNameToStore;
        $posts->save();
        // end of insertion
         return redirect('/home')->with('success', 'Post Created Successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        return view('posts.show')->with('posts', $posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);

        //check for correct user
        if(auth()->user()->id !== $posts->user_id){
            return redirect('/posts')->with('error', 'Unauthorized User!!');
        }

        return view('posts.edit')->with('posts', $posts);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')){
            //Get Filename with Extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just Filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just Ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to Store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_image', $fileNameToStore);
        } 



        // edit data on post table
        $posts = Post::find($id);
        $posts->title = $request->input('title');
        $posts->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $posts->cover_image = $fileNameToStore;   
        }
        $posts->save();
        // end of edit
         return redirect('/home')->with('success', 'Post Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);

        //check for correct user
        if(auth()->user()->id !== $posts->user_id){
            return redirect('/posts')->with('error', 'Unauthorized User!!');
        }

        if($posts->cover_image !== 'noimage.jpg'){
            //delete image
            Storage::delete('public/cover_image/' . $posts->cover_image);
        }
        
        // it will delete data from the post table and redirect to main page
        $posts->delete();
        return redirect('/home')->with('success', 'Post Deleted Successfully!!');

    }
}
