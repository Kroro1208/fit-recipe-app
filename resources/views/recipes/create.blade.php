<x-app-layout>
    <form class="w-10/12 p-4 mx-auto bg-white rounded-xl">
        <div class="mb-3">
            {{Breadcrumbs::render('recipes.create')}}
        </div>
        <div class="grid grid-cols-2 rounded-xl border bg-white border-gray-200">
            <div class="col-span-1">
                <img class="object-cover rounded-l-xl w-full aspect-video" src="/image/cooking.jpg" alt="recipe-image">
            </div>
            <div class="col-span-1 p-3">
                <input type="text" name="title" placeholder="レシピ名を入力" class="rounded-xl border border-gray-300 p-2 mb-4 w-full">
                <textarea name="description" placeholder="レシピ名の概要" class="rounded-xl border border-gray-300 p-2 mb-4 w-full"></textarea>
            </div>
        </div>
    </form>
</x-app-layout>



