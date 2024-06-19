<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderByDesc('created_at')->get();

        return view('category-index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

        $categoryValidated = $request->validated();

        $category = new Category();
        $category->name = $categoryValidated['category-name'];
        $category->user_id = auth()->id();
        $category->save();

        // Category::create([
        //     'name' => $category['category-name'],
        //     'user_id' => 1,
        // ]);

        // Na teoria isso era pra funcionar
        // $category = Category::create($request->all());

        return redirect()->route('home.index')->with('sucess', 'Categoria cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // $categories = Category::where('id', $id)->get();
        return view('update-category', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request->validated();
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id); // Encontra a categoria ou retorna um 404
        $category->delete(); // Apaga a categoria

        return redirect()->route('home.index');
        // $category->delete();
    }
}
