<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function GetPostData()
    {

        $post = Post::all();

        return $post;
    }

    //make this function works with request
    public function StorePostData(Request $request)
    {
        $postText = 'halo nama saya edmund saya tidak jomok';

        $store = Post::create([
            'post_text' => $postText,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $store,
        ]);
    }

    //make this function works with request
    public function UpdatePostData(Request $request)
    {
        $postId = $request->id;
        $postText = $request->postText;

        $update = Post::where('id', $postId)
                        ->update(['post_text' => $postText]);

        return response()->json([
            'status' => 'update success',
            'data' => $update,
        ]);

    }

    //make this functions works with request
    public function DeletePostData(Request $request)
    {
        $postId = 1;

        $delete = Post::where('id', $postId)
                        ->delete();

        return response()->json([
            'status' => 'Data Deleted',
            'data' => $delete,
        ]);
    }

    public function AutoGeneratePost(Int $number)
    {
        foreach(range(1, $number) as $index) {
            $postString = Str::random(10);

            Post::create([
                'post_text' => $postString,
            ]);
        }

        return response()->json([
            'status' => 'generate done',
            'number of data' => $number,
        ]);

    }

    public function ShowDataPost(Request $request)
    {
        $postId = $request->id;

        $data = Post::where('id', $postId)
                      ->get();

        return response()->json([
            'status' => 'Success',
            'Data' => $data
        ]);
    }



    //make a function that can create automatically 10 data into table in database
}
