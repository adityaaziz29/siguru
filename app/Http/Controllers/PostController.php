<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:155',
            'client' => 'required',
            'leader' => 'required',
            'image' => 'image|mimes:png,jpg|max:2048',
            'email' => 'required',
            'start' => 'required|date|max:10',
            'end' => 'required|date|max:10',
            'status' => 'required'
        ]);

        if($request->file('image')){
            $this->validate['image'] = $request->file('image')->store('post-images');
        }

        $post = Post::create([
            'name' => $request->name,
            'client' => $request->client,
            'leader' => $request->leader,
            'image' => $request->image->hashName(),
            'email' => $request->email,
            'start' => $request->start,
            'end' => $request->end,
            'status' => $request->status,
            'slug' => Str::slug($request->name)
        ]);

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:155',
            'client' => 'required',
            'leader' => 'required',
            'email' => 'required',
            'start' => 'required|date|max:10',
            'end' => 'required|date|max:10',
            'status' => 'required'
        ]);

        $post = Post::findOrFail($id);

        $post->update([
            'name' => $request->name,
            'client' => $request->client,
            'leader' => $request->leader,
            'email' => $request->email,
            'start' => $request->start,
            'end' => $request->end,
            'status' => $request->status,
            'slug' => Str::slug($request->name)
        ]);

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('post.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
    
}
