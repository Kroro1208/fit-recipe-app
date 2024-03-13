<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Step;
use App\Models\Ingredient;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


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
        $categories = Category::all();

        return view('recipes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $posts = $request->all();
        $uuid =Str::uuid()->toString();
        
        $image = $request->file('image');
        // s3に画像をアップロード→
        $path = Storage::disk('s3')->putFile('recipe', $image, 'public');
        // s3に保存した画像URLを取得及び変換→
        $url = Storage::disk('s3')->url($path);
        
        $now = now(); // 現在の日時を取得
        
        try {
            DB::beginTransaction();
            Recipe::insert([
                // $request->all();は配列を返すので、配列の要素にアクセスする場合は、
                // オブジェクトのプロパティアクセス構文(->)ではなく、配列のアクセス構文(['key'])を使用する必要がある
                'id' => (string) Str::uuid(),
                'title' => $posts['title'],
                'description' => $posts['description'],
                'category_id' => $posts['category'], // recipesテーブルではカラム名はcategory_id
                'image'=> $url, // 画像URLをDBに保存
                'user_id' => Auth::id(),
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $ingredients = [];
            foreach($posts['ingredients'] as $key => $ingredient) {
                $ingredients[$key] = [
                    'recipe_id' => $uuid,
                    'name' => $ingredient->name,
                    'quantity' => $ingredient->quantity
                ];
            }

            Ingredient::insert($ingredients);

            $steps = [];
            foreach($posts['steps'] as $key => $step) {
                $steps[$key] = [
                    'recipe' => $uuid,
                    'step_number' => $key + 1,
                    'description' => $step
                ];
            }

            Step::insert($steps);
            DB::commit();

        } catch(\throwable $th) {
            DB::rollBack();
            \Log::debug(print_r($th->getMessage(), true));
            throw $th;
        }

        
        return to_route('recipes.show', ['recipes'=>$uuid])->with('success', 'レシピが投稿されました');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recipe = Recipe::with(['ingredients', 'steps', 'reviews.user', 'user'])->where('recipes.id', $id)->first();
        $recipe_record = Recipe::find($id);
        $recipe_record->increment('views'); // 一度ページを見たらview数を増やす



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
