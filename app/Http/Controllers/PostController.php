<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;

class PostController extends Controller
{

    public function add(Request $request)
    {

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);
        if (!($validator->passes())) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
         post::create([
             'title'=>$request['title'],
             'content'=>$request['content']
         ]);


    }

}