<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;

class RecipeController extends Controller
{

    public function home() {

        // home画面で表示したい情報だけ取得
        $recipes = Recipe::select('recipes.id', 'recipes.title', 'recipes.description', 'recipes.created_at', 'recipes.image', 'recipes.views', 'users.name')
        ->join('users', 'users.id', '=', 'recipes.user_id')->orderBy('recipes.created_at', 'desc')->limit(3)
        ->get();

        $popular = Recipe::select('recipes.id', 'recipes.title', 'recipes.description', 'recipes.created_at', 'recipes.views', 'recipes.image', 'users.name')
        ->join('users', 'users.id', '=', 'recipes.user_id')->orderBy('recipes.views', 'desc')->limit(3)
        ->get();
    
        return view('home', compact('recipes', 'popular'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->all();
        
        $query = Recipe::query()->select('recipes.id', 'recipes.title', 'recipes.description', 'recipes.created_at', 'recipes.image', 'recipes.views', 'users.name')
        ->join('users', 'users.id', '=', 'recipes.user_id')
        ->leftJoin('reviews', 'reviews.recipe_id', '=', 'recipes.id')
        ->groupby('recipes.id')
        ->orderBy('recipes.created_at', 'desc');

        if(!empty($filters)) {
            if(!empty($filters['categories'])) {
                $query->whereIn('recipes.category_id', $filters['categories']);
            }

            if(!empty($filters['rating'])) {
                $query->havingRaw('AVG(reviews.rating) >= ?', [$filters['rating']])->orderByRaw('AVG(reviews.rating) desc');
            }

            if(!empty($filters['title'])) {
                $query->where('recipes.title', 'like', '%'. $filters['title']. '%');
            }
        }

        $recipes = $query->paginate(5);

        $categories = Category::all();
       
        
        return view('recipes.index', compact('recipes', 'categories', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recipe = Recipe::find($id);
        $recipe->increment('views'); // 一度ページを見たらview数を増やす
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
