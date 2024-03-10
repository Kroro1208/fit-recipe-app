<x-app-layout>
    <div class="grid grid-cols-3 gap-5">
        <div class="col-span-2 bg-sky-100 rounded-xl p-4 mb-5">
            @foreach($recipes as $recipe)
                @include('recipes.partial.card')
            @endforeach
            <a href="{{route('home')}}" class="text-white block text-center text-xl border border-gray-400 rounded-xl bg-gray-800 shadow-md py-2 px-3 hover:bg-slate-500 hover:text-white">ホーム画面へ戻る</a>
        </div>
        <div class="col-span-1 bg-white rounded-xl p-5 h-max sticky top-4">
            <form name="form" method="GET" action="{{route('recipes.index')}}">
                <div class="flex gap-3 items-center justify-center mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                      </svg>
                    <h3 class="font-bold text-xl">レシピを絞り込む</h3>
                </div>
                <div class="mb-4 border border-slate-300 p-4 rounded-xl">
                    <label class="text-lg mb-2 text-gray-600 font-bold">評価</label>
                    <div class="ml-4 mb-2">
                        <input type="radio" name="rating" value="0" {{ request()->get('rating', 0) == '0' ? 'checked' : '' }}/>
                        <label for="rating">指定しない</label>
                    </div>
                    <div class="ml-4 mb-2">
                        <input type="radio" name="rating" value="5" {{ request()->get('rating') == '5' ? 'checked' : '' }}/>
                        <label for="rating">5</label>
                    </div>
                    <div class="ml-4 mb-2">
                        <input type="radio" name="rating" value="4" {{ request()->get('rating') == '4' ? 'checked' : '' }}/>
                        <label for="rating">4以上</label>
                    </div>
                    <div class="ml-4 mb-2">
                        <input type="radio" name="rating" value="3" {{ request()->get('rating') == '3' ? 'checked' : '' }}/>
                        <label for="rating">3以上</label>
                    </div>
                </div>
                <div class="mb-4 border border-slate-300 p-4 rounded-xl">
                    <label class="text-lg mb-2 text-gray-600 font-bold">カテゴリ</label>
                    @foreach ($categories as $category)
                        <div class="ml-4 mb-2">
                            <input type="checkbox" id="category{{$category['id']}}" name="categories[]" value="{{$category['id']}}" class="rounded-full"
                            {{ in_array($category['id'], request()->get('categories', [])) ? 'checked' : '' }}
                            />
                            <label for="category{{$category['id']}}">{{$category->name}}</label>
                        </div>
                    @endforeach
                </div>
                <input type="text" name="title" value="{{request()->get('title', '')}}" placeholder="お探しのレシピ名を入力してください" class="text-center border border-slate-300 p-2 rounded-xl w-full focus:ring-2">
                <div class="flex justify-center mt-5">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-xl mt-3 mx-auto">絞り込み検索</button>
                    <button type="button" id="clearButton" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-xl mt-3 mx-auto">条件クリア</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('clearButton').addEventListener('click', function() {
            // 各フィールドをリセット
            document.querySelector('input[type="text"][name="title"]').value = '';
            document.querySelectorAll('input[type="radio"][name="rating"], input[type="checkbox"][name="categories[]"]').forEach(function(input) {
                input.checked = false;
            });

            // 「指定しない」のラジオボタンをデフォルトで選択
            document.querySelector('input[type="radio"][name="rating"][value="0"]').checked = true;
        });
    </script>
</x-app-layout>
