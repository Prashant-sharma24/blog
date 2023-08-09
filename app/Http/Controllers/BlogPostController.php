<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function index()
    {
        $blogPost  = BlogPost::all();
        return view('home', compact('blogPost'));
    }
    public function showAll()
    {
        // Retrieve all blog post data
        $blogPosts = BlogPost::all();

        // Pass the data to a view
        return view('home', ['blogPosts' => $blogPosts]);
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:8048',
            'url' => 'required|url',
        ], [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title field must not exceed 255 characters.',
            'description.required' => 'The description field is required.',
            'image.image' => 'The image must be a valid image file (jpeg, png, jpg, gif).',
            'image.max' => 'The image size must not exceed 8048 KB.',
            'url.required' => 'The URL field is required.',
            'url.url' => 'The URL must be a valid URL.',
        ]);
        // dd($request->all());
        // Upload the image if present
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }
        // Generate a unique identifier for the blog post
        $uniqueIdentifier = Str::uuid()->toString();

        // Create a new blog post
        $blogPost = new BlogPost();
        $blogPost->title = $validatedData['title'];
        $blogPost->description = $validatedData['description'];
        $blogPost->image = $imageName;
        $blogPost->url = $validatedData['url'];
        $blogPost->user_id = Auth::id();
        $blogPost->unique_identifier = $uniqueIdentifier;

        $blogPost->save();

        // Prepare the response data
        $url = route('user.view', ['identifier' => $uniqueIdentifier]);
        // Fetch the blog post data by ID
        $blogPost = BlogPost::findOrFail($blogPost->id);
        // Redirect to the success view with the URL to view the data
        return redirect('/user/view/' . $uniqueIdentifier)->with([
            'url' => $url,
            'blogPost' => $blogPost,
        ]);
        // return view('user.view',['identifier' => $uniqueIdentifier], compact('url', 'blogPost'));
    }


    public function upload($id)
    {
        return view('user.upload', ['id' => $id]);
    }


    public function view($identifier)
    {
        // Fetch the data from the database using the custom identifier
        $blogPost = BlogPost::where('unique_identifier', $identifier)->firstOrFail();

        // Pass the data to a view for display
        return view('user.view', compact('blogPost'));
    }

    public function success($id)
    {
        // Fetch the blog post data by ID
        $blogPost = BlogPost::findOrFail($id);

        // Generate the URL for the view page and encode it
        $url = route('user.view', ['identifier' => $blogPost->unique_identifier]);

        // Pass the necessary data to the success view
        return view('user.view', compact('url', 'blogPost'));
    }


    public function edit($identifier){
        $blogPost =BlogPost::where('unique_identifier', $identifier)
        ->where('user_id', Auth::id())
        ->firstOrFail();

        return view('user.edit', compact('blogPost'));
    }


    public function update(Request $request, $identifier){

        $blogPost=BlogPost::where('unique_identifier', $identifier)
        ->where('user_id', Auth::id())
        ->firstOrFail();

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description'  => 'required|string',
            'url' => 'required|url',

        ]);

        $blogPost->update($validatedData);

        return redirect()->route('user.view', ['identifier' => $identifier])
        ->with('success', 'blog post update succesfully');

    }



    public function saveUpload(Request $request, $id)
    {
        $validatedData = $request->validate([
            'live_link' => 'required|url',
        ]);

        // Find the blog post
        $blogPost = BlogPost::findOrFail($id);

        // Save the live link
        $blogPost->live_link = $validatedData['live_link'];
        $blogPost->save();

        // Redirect to a success page or perform other actions
        return redirect()->route('user.show', ['id' => $blogPost->id]);
    }
}
