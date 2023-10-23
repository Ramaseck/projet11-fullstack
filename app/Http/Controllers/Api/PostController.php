<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\CreatePostRequest; // Ajout de l'import
use App\Http\Requests\EdiPostRequest; // Ajout de l'import
use Mockery\CountValidator\Exception;
use Exception;
use Illuminate\Request;
class PostController extends Controller
{
    public function index(Request $request)
    {
      $query = Post::query();
      $perPage =1;
      $page = $request->inpur('page', 1)  ;
      $search = $request->input('search');
      if($search){
        $query->whereRaw{ 'titre Like'%".$search."%};
      }
    }

    public function store(CreatePostRequest $request)
    {
        dd($request);
        $post = new Post();
        $post->title = 'Titre exemple';
        $post->description = 'exemple description';
        $post->user_id =auth()->user()->id;
        $post->save();
    }
    public function update(EdiPostRequest $request, Post $post)
    {
        dd($post);
        $post = new Post();
        $post->title = 'Titre exemple';
        $post->description = 'exemple description';
        if($post->user_id=auth()->user()->id){
            $post->save();

        }else{
            return response()->json([
                'status_code'=>422,
                'status_massage'=> 'vous n"avez pas l"auteur de ce post',
                'data'=>$post
            ]);


        }
    }
    public function delete( Post $post){
        try{
            $post->delete();
            return response()->json([
                'status_code' =>200,
                'status_message'=>'Le post a été modifié',
                'data'=>$post
            ]);
        }catch (Exception $e){
            return response()->json($e);
        }
    }


}
