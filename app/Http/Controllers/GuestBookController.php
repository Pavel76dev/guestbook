<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;

class GuestBookController extends Controller
{
    public function guestbook()
	{
        $posts = Post::orderBy('id', 'desc')->paginate(25);
		return view('guestbook', ['posts' => $posts]);
	}
}
