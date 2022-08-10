<?php

namespace App\Http\Controllers;

use App\Models\FavCart;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function index(Request $request){

        $posts = [];

        if($request->q)
        $posts = Post::where('title', 'like', '%'.$request->q.'%')->get();
        else
        $posts = Post::all();

        $favId = [];

        if(Auth::user()){
           $array =  FavCart::where('user_id', Auth::id())->get('post_id');
           foreach ($array as $value) {
            $favId[] = $value->post_id;
           }
        }

        return view('public.index', compact('posts', 'favId'));
    }

    public function showPost($id){
        $data = Post::where('id',$id)->with(['categories'=>function($q){
            $q->with(['category']);
        }, 'comments'=>function($q){
            $q->with(['user'])->latest();
        }])->firstOrFail();

        $check  = FavCart::where('post_id', $id)->where('user_id', auth()->id())->where('state', 1)->value('id');

        return view('public.detail', compact('data', 'check'));
    }

    public function addToFavCart($id, $cart){
        Post::findOrFail($id);

        $check =FavCart::where('user_id', Auth::id())->where('post_id', $id)->where('state', $cart)->first();
        if($check){
            $check->delete();
        }else{
            FavCart::create([
                'user_id' => Auth::id(),
                'post_id' => $id,
                'state' => $cart
            ]);
        }

        return redirect()->back();

    }
}
