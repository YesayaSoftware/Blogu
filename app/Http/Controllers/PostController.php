<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index()
    {
        $posts = Post::all();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('posts.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $this->getValidate($request);

        Post::create([
            'title' => $request['title'],
            'body' => $request['body'],
            'category_id' => $request['category_id'],
            'url' => $request['url'],
            'user_id' => Auth::id()
        ]);

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('posts.edit', [
            'categories' => $categories,
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $this->getValidate($request);

        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->category_id = $request['category_id'];
        $post->user_id = Auth::id();

        $post->save();

        return redirect()->route('posts.show', [
            'post' => $post
        ]);
    }


    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }

    /**
     * @param Request $request
     */
    private function getValidate(Request $request): void
    {
        $request->validate([
            'title' => ['required'],
            'body' => ['required'],
            'category_id' => ['required']
        ]);
    }
}
