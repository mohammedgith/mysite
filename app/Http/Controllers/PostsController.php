<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Support\facades\Storage;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdateFormRequest;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct(){
    //     $this->middleware('check',['except' => ['index','show','create']]);
    // }
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }
    public function index()
    { 
        $post = Post::latest()->paginate(3);
       $post = Post::all();
        return view('posts.index')->with('posts', Post::latest()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
       return view('posts.create',)->with('post',$post)->with('tags',Tag::all())->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // dd($request->image->store('public'));
      
       $post = Post::create([
       'title' => $request->title, 
       'description' => $request->description,
       'content' => $request->content,
         'image' => $request->image->store('images','public'),
         'category_id' => $request->categoryID,
         'user_id' => auth()->user()->id
        ]);
        if($request->tags){
            $post->tags()->attach($request->tags);
        }
        session()->flash('success','post created successfuly');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user = $post->user;
        $profile = $user->profile;
       return view('posts.show')->with('post',$post)->with('categories',Category::all())->with('profile',$profile)
       ->with('user',$user)->with('tags',Tag::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('posts',$post)->with('categories', Category::all())->with('tags',Tag::all());
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormRequest $request ,Post $post)
    {
        $data = $request->only(['title','description','content']);
      if($request->hasFile('image')){
          $image = $request->image->store('images','public');
          Storage::disk('public')->delete($post->image);
          $data['image'] = $image; 
      }
      if($request->tags){
          $post->tags()->sync($request->tags);
      }
      $post->update($data);
      session()->flash('success','post updated successfuly');
    return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('success','post deleted successfuly');
        return redirect(route('posts.index'));
    }
    public function trashed(){
        $trashed = Post::onlyTrashed()->get();
        return view('posts.index')->with('posts',$trashed);
    }
    public function restore($id){
        Post::onlyTrashed()->where('id',$id)->restore();
        session()->flash('success','post restored successfuly');
    return redirect(route('posts.index'));
    }  
    public function forceDelete($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        storage::delete($post->image);
        $post->forceDelete();
        session()->flash('success','post force Delete successfuly');
        return redirect(route('posts.index'));
    }
}
    