<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::withCount('categories')->latest()->paginate(10);
        return view('admin.post.index',compact('data'));
    }


    public function create()
    {
        $category = Category::all();
        return view('admin.post.create', compact('category'));
    }


    public function store(PostRequest $request)
    {
        $image = $request->file('file')->hashName();
        $request->file('file')->move('posts', $image);

        $request->merge(['image'=>$image]);

        $id = Post::insertGetId([ 'title' => $request->title,
                            'price' => $request->price,
                            'descritpion' => $request->descritpion,
                            'color'=>$request->color,
                            'size' => $request->size,
                            'image' => $request->image,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);

      $this->addToPostCategroy($request, $id);

        return redirect()->back()->with(['msg'=>'بەسەرکەوتوی دروستکرا']);
    }

    public function edit($id)
    {
        $data = Post::where('id', $id)->firstOrFail();
        $category = Category::all();

        $arrID = [];

        foreach (PostCategory::where('post_id', $id)->get() as $value) {
           $arrID[] = $value->category_id;
        }


        return view('admin.post.edit', compact('data', 'category', 'arrID'));
    }


    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        PostCategory::where('post_id', $id)->delete();

        $image = $post->image;
        if($request->file){
            $image = $request->file('file')->hashName();
            $request->file('file')->move('posts', $image);
        }

        $request->merge(['image' => $image]);

        $post->update(($request->only('title', 'price','descritpion', 'color', 'size', 'image')));

        $this->addToPostCategroy($request, $id);

        return redirect()->back()->with(['msg'=>'بەسەرکەوتوی تازەکرایەوە']);

    }

    public function addToPostCategroy($request, $id){
        if(count($request->category) > 0){
            foreach ($request->category as  $value) {
                if(Category::find($value)){
                    PostCategory::create([
                        'post_id' => $id,
                        'category_id' => $value
                    ]);
                }
            }
        }
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $path = 'posts/'.$post->image;
        if(file_exists($path)){
            unlink($path);
        }
        $post->delete();
        return redirect()->route('post.index');
    }
}
