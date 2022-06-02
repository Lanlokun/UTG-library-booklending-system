<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Posts/Index', [
            'posts' => Post::query()
                ->when(Request::input('search'), function ($query, $search){
                    $query->where('title', 'like', "%{$search}%");
                })->paginate(5)->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    public  function  create()
    {
        return Inertia::render(('Posts/Create'));
    }

    public function store()
    {
        $file = Request::file('img')->store('posts', 'public');
        Post::create([
            'title' => Request::input('title'),
            'description' => Request::input('description'),
            'file' => $file
        ]);

        return redirect(route('admin.posts.index'))->with('flash.banner', 'Post Created Successfully');
    }



    public  function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {

        $validated = Request::validate([
            'title' => 'required | string',
            'description' => 'required | string',
            'file' => 'sometimes|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048',

        ]);

        $post->update($validated);

        return redirect()->route('admin.posts.index')->with('flash.banner', 'Post Updated Successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('flash.banner', 'Post deleted successfully')->with('flash.bannerStyle', 'danger');
    }
}
