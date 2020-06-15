<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class CommentController extends Controller
{
    
    public function add(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required',
            'content' => 'required',
            'post_id' => 'required',
        ]);
        if (!($validator->passes())) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        comment::create([
            'name'=>$request->get('name'),
            'content'=>$request->get('content'),
            'post_id'=>$request->get('post_id')
        ]);

    }
}
