<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('categories.index', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function __construct()
    {
        $this->middleware('checkUserId');
    }
    public function create()
    {
        $categories = Category::all();
        return view('categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $categories = Category::where('parent_id', null)->orderBy('name', 'asc')->get();

        if ($request->isMethod('get')) {
            return view('categories.index', compact('categories'));
        }

        if ($request->isMethod('post')) {
            $validator = $request->validate([
                'name' => 'required',
                'slug' => 'required|unique:categories',
                'parent_id' => 'nullable|numeric'
            ]);

            Category::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'parent_id' => $request->parent_id
            ]);

            return redirect()->back()->with('success', 'Category has been created successfully.');
        }
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view('categories.edit', compact('category', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $validator = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $category->id,
            'parent_id' => 'nullable|numeric'
        ]);

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->parent_id = $request->parent_id;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'User deleted successfully.');
    }
}
