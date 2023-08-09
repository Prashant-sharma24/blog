<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BlogController extends Controller
{

    public function __construct()
{
    $this->middleware('checkUserId');
}
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $blogs = Blog::with('category')->latest()->paginate(5);
        return view('blogs.index', compact('blogs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'category_id' => 'required',
        ]);
        unset($validatedData['category_id']);
        $blog = Blog::create([
            'name' => $validatedData['name'],
            'detail' => $validatedData['detail'],
        ]);

        $category_id = $request->input('category_id');
        $blog->category()->attach($category_id);

        return redirect()->route('blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog): View
    {

        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('blogs.edit', compact('blog'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'category_id' => 'required|exists:App\Models\Category,id',
        ]);

        $blog->update($request->all());
        // $blog->name = $request->name;
        // // $post->slug = \Str::slug($request->slug);
        // $blog->detail = $request->detail;
        // $blog->category_id = $request->category_id;

        return redirect()->route('blogs.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog): RedirectResponse
    {
        $blog->delete();

        return redirect()->route('blogs.index')
            ->with('success', 'Product deleted successfully');
    }
}
