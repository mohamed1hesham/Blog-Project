<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function post_page()
    {
        return view('admin.add_page');
    }
    public function add_post(Request $request)
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
            'post_status' => 'active',
            'user_id' => $user_id,
            'name' => $user_name,
            'user_type' => $user_type,
            'image' => $imagename,

        ]);

        return redirect()->back()->with('message', 'post added successfully');
    }

    public function show_post()
    {
        $data = Post::all();
        return view('admin.show_post', compact('data'));
    }

    public function delete_post($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->back()->with('message', 'Post Deleted Succesfully');
    }

    public function edit_post($id)
    {
        $post = Post::find($id);
        return view('admin.edit_page', compact('post'));
    }

    public function update_post(Request $request, $id)
    {
        $data = Post::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('postimage', $imagename);
            //store image in database table
            $data->image = $imagename;
        }
        $data->save();

        return redirect()->back()->with('message', 'Post updated Successfully');
    }
}
