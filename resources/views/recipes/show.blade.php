<x-app-layout>
    <div class="mb-3">
        {{Breadcrumbs::render('recipes.show', $recipe)}}
    </div>
    <div class="mx-auto rounded-xl">
        <div class="grid grid-cols-2 rounded-xl border bg-white border-gray-200">
            <div class="col-span-1">
                <img class="object-cover rounded-l-xl h-40 w-full" src="{{$recipe->image}}" alt="{{$recipe->title}}">
            </div>
            <div class="col-span-1 p-3">
                <p class="text-lg font-semibold">ユーザー名</p>
                <h4 class="text-2xl font-bold mb-2">材料</h4>
                <p>{{$recipe->description}}</p>
            </div>
        </div>
    </div>
</x-app-layout>