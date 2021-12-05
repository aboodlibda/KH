<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        $allPosts = Post::all();
        $lastTow =Category::where('name','الزراعة')->get();
        $projects = Project::all();
        $transactions = Transaction::all();
        return view('blog.index',compact('posts','allPosts','lastTow','projects','transactions'));
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
        $post = Post::findOrFail($id);

        return view('blog.single',compact('post'));
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
        //
    }

    public function saveComment(Request $request)
    {
        $comment = new Comment();
        $comment->content = $request->get('content');
        $comment->post_id = $request->id;
        $comment->save();
        return redirect('/home/'.$request->id);

    }

    public function dashboard()
    {
        $posts_count = Post::all()->count();
        $categories_count = Category::all()->count();
        $tags_count = Tag::all()->count();
        $users_count = User::all()->count();
        $slides = Post::all()->take(5);
        return view('CMS.dashboard',compact('posts_count','categories_count','tags_count','users_count','slides'));
    }

    public function search($text)
    {
       return Post::where('title','like','%'.$text.'%')->get();
    }

    public function media()
    {
        $allPosts = Post::all();
        return view('blog.media',compact('allPosts'));
    }
}
