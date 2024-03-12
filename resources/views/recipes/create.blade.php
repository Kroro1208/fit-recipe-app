<x-app-layout>
    <form method="POST" action="{{route('recipes.store')}}" class="w-10/12 p-4 mx-auto bg-white rounded-xl">
        @csrf
        <div class="mb-3">
            {{Breadcrumbs::render('recipes.create')}}
        </div>
        <div class="grid grid-cols-2 rounded-xl border bg-white border-gray-200">
            <div class="col-span-1">
                <img class="object-cover rounded-l-xl w-full aspect-video" src="/image/cooking.jpg" alt="recipe-image">
            </div>
            <div class="col-span-1 p-3">
                <input type="text" name="title" placeholder="レシピ名を入力" class="rounded-xl border border-gray-300 p-2 mb-4 w-full">
                <textarea name="description" placeholder="レシピ名の概要" cols="30" rows="10" class="rounded-xl border border-gray-300 p-2 mb-4 w-full"></textarea>
                <select name="category" id="category" class="border border-gray-300 p-2 mb-4 w-full rounded-xl">
                    <option value="">カテゴリーを選ぶ</option>
                    @foreach ($categories as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-xl">
                        レシピを投稿する</button>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>



