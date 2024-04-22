<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function index3() {
        dd(Comment::all());
    }
    public function create() {
        Comment::create([
            "content" => "hahahahahqha",
            "product_id"=>"0101",
        ]);
    }
}
