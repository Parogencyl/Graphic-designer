<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($id){
        session(['idPost' => $id]);
        return view('/post');
    }

    public function addComment(Request $request){
        $idPost = session('idPost');
        $name = $request->input('name');
        $text = $request->input('text');

        if(DB::table('comments')->insert(['name' => $name, 'text' => $text, 'id_post' => $idPost])){
            return back()->with('commentAdded', 'Komentarz został dodany');
        } else {
            return back()->with('commentNotAdded', 'Nie udało się dodać komenatarza');
        }
    }

    public function getTags($tagName){

    $posts = DB::table('blog')->where('tag1', '=', $tagName)->orWhere('tag2', '=', $tagName)->orWhere('tag3', '=', $tagName)->orderBy('created_at', 'DESC')->paginate(3);

    return redirect('/blog')->with('setTag', $posts);
    }
}
