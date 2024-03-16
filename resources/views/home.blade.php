<x-app-layout>
    <div class="grid grid-cols-4 gap-4">
        <div class="col-span-1 bg-white rounded-xl p-4">
            <h3 class="text-2xl font-bold mb-2">レシピ検索</h3>
            <ul class="ml-6 mb-4">
                <li><a href="">全てレシピ</a></li>
                <li><a href="">人気のレシピ</a></li>
            </ul>
            <h3 class="text-2xl font-bold mb-2">レシピ投稿</h3>
            <ul class="ml-6 mb-4">
                <li><a href="">全てレシピ</a></li>
                <li><a href="">人気のレシピ</a></li>
            </ul>              
        </div>
        <div class="col-span-2 bg-white rounded-xl p-4">
            <h2 class="text-2xl font-bold mb-2">新着レシピ</h2>
            @foreach($recipes as $recipe)
            @include('recipes.partial.card')
            @endforeach
                <a href="{{route('recipes.index')}}" class="text-white block text-center text-xl border border-gray-400 rounded-xl bg-gray-800 shadow-md py-2 px-3 hover:bg-slate-500 hover:text-white">全てのレシピへ</a>
        </div>
    </div>
    <div class="grid grid-cols-4 gap-4 mt-4">
        <div class="col-span-3 bg-white rounded-xl p-4 mb-4">
            <h2 class="text-2xl font-bold mb-2">人気レシピ</h2>
            <div class="col-span-2 flex justify-between bg-white rounded-xl mb-6">
                @foreach($popular as $p)
                    <a href="{{route('recipes.show', ['recipe'=>$recipe->id])}}" class="max-20 rounded-xl overflow-hidden shadow-lg mx-4 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition duration-300 ease-in-out">
                        <img src="{{$recipe->image}}" alt="{{$recipe->title}} " class="object-cover rounded-t-xl max-h-44 h-44 w-full rounded-l-xl">
                        <div class="px-6 py-4">
                            <div class="mb-2 text-2xl font-bold">{{$recipe->title}}</div>
                            <p  class="text-lg">{{$recipe->description}}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            <a href="{{route('recipes.index')}}" class="text-white block text-center text-xl border border-red-400 rounded-xl bg-pink-400 shadow-md py-2 px-3 hover:bg-pink-600 hover:text-white">人気のレシピへ</a>
        </div>
        <div class="col-span-1 bg-white rounded-xl ml-4 mb-4"></div>
    </div>
</x-app-layout>
