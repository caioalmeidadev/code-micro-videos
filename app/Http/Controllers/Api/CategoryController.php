<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    private $rules = [
        'name' => 'required|max:255',
            'is_active' => 'boolean'
    ];

    public function index(Request $request)
    {
        if($request->has('only_trashed')){
            return Category::onlyTrashed()->get();
        }
       return Category::all();
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        return Category::create($request->all());
    }


    public function show(Category $category)
    {
        return $category;
    }


    public function update(Request $request, Category $category)
    {
        $this->validate($request, $this->rules);
        $category->update($request->all());

        return $category;
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return response()->noContent(); //status code: 204 - success with no content
    }
}
