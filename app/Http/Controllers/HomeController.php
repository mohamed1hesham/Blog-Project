<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $post = Post::all();

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {

                return view('home.homepage', compact('post'));
            } else if ($usertype == 'admin') {

                return view('admin.adminhome');
            } else {
                return redirect()->back();
            }
        }
    }
    public function post()
    {
        return view("post");
    }
    public function homepage()
    {
        $post = Post::all();
        return view('home.homepage', compact('post'));
    }
    public function post_details($id)
    {
        $post = Post::find($id);

        return view('home.post_details', compact('post'));
    }
    public function create_post()
    {
        return view('home.create_post');
    }
    public function user_post(Request $request)
    {
        $user = Auth()->user();
        $user_id = $user->id;
        $user_name = $user->name;
        $user_type = $user->usertype;

        $image = $request->image;

        if ($image) {
            // Generate a unique filename based on the current timestamp and the original extension of the uploaded image
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
        }

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',

        ]);
        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'post_status' => 'pending',
            'user_id' => $user_id,
            'name' => $user_name,
            'user_type' => $user_type,
            'image' => $imagename,

        ]);

        return redirect()->back()->with('message', 'post added successfully');
    }
}
