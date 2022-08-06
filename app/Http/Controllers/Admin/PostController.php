<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::paginate(10);
        return view('admin.post.index',compact('data'));
    }


    public function create()
    {
        return view('admin.post.create');
    }


    public function store(PostRequest $request)
    {
        $image = $request->file('file')->hashName();
        $request->file('file')->move('posts', $image);

        $request->merge(['image'=>$image]);

        Post::create($request->only('title', 'price','descritpion', 'color', 'size', 'image'));

        return redirect()->back()->with(['msg'=>'بەسەرکەوتوی دروستکرا']);
    }

    public function edit($id)
    {
        $data = Post::findOrFail($id);
        return view('admin.post.edit', compact('data'));
    }


    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $image = $post->image;
        if($request->file){
            $image = $request->file('file')->hashName();
            $request->file('file')->move('posts', $image);
        }

        $request->merge(['image' => $image]);

        $post->update(($request->only('title', 'price','descritpion', 'color', 'size', 'image')));
        return redirect()->back()->with(['msg'=>'بەسەرکەوتوی تازەکرایەوە']);

    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $path = 'posts/'.$post->image;
        if(fileExists($path)){
            unlink($path);
        }
        $post->delete();
        return redirect()->route('post.index');
    }
}
