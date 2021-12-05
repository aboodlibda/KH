<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Inline\Element\Code;
use function PHPUnit\Framework\countOf;

class PostsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::all();
       return view('CMS.posts.index',compact('posts','tags','categories'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.createPost',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'title'=>'required|min:10',
            'body'=>'required|min:50',
            'image'=>'required',
            'category_id'=>'required',
            'tag_id'=>'required',

        ]);

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $request->image->move(public_path('postsImages/'), $imageName);
        $post = new Post();
        $post ->image=($imageName);
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->category_id = $request->get('category_id');
        $post->user_id = Auth::id();
        $post->status = $request->get('Published') == 'on' ? 'Published' : 'UnPublished';
        $post->save();
        $post->tags()->attach($request->tag_id);
        session()->flash('post_added');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $allPosts = Post::all();

        return view('post',compact('post','allPosts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        $categories = Category::all();
        $tags = Tag::all();
        return view('CMS.posts.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $request->validate([
            'title'=>'required|min:10',
            'body'=>'required|min:50'

        ]);

        if ($request->hasFile('image')){
        $image = $request->file('image');
//        dd($image);
            $imageName = $image->getClientOriginalName();
        $request->image->move(public_path('postsImages/'), $imageName);
        $post->image=($imageName);
        }
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->category_id = $request->get('category_id');
        $post->status = $request->get('Published') == 'on' ? 'Published' : 'UnPublished';
        $post->tags()->sync($request->tag_id);
        $post->save();
        session()->flash('post_updated');
        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $post->delete();
        $post->tags()->detach();
        session()->flash('post_deleted');
        return redirect()->route('posts.index');
    }

    public function publish($id)
    {
        $item = Post::findorFail($id);
         if ($item->status =='Published'){
             $item->update([
                 'status'=>'UnPublished'
             ]);

         }elseif ($item->status =='UnPublished'){
             $item->update([
                 'status'=>'Published'
             ]);
         }
         return redirect()->route('posts.index');
    }
}
