<section class="shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{route('home')}}" class="flex items-center">
            <img src="/image/logo.svg" alt="logo" class="w-20 h-20">
            <h1 class="font-semibold text-blue-700 text-3xl mr-auto">Fit Recipe</h1>
        </a>
        <form action="" class="flex gap-5">
            <input type="text" name="keyword" class="rounded-xl border border-gray-300  px-5 py-2.5 focus:outline-none focus:ring-blue-500 text-center" placeholder='レシピを探す'>
            <button type="submit" class="focus:outline-none text-white bg-blue-600 hover:bg-indigo-700 rounded-full px-5 py-2.5 ml-2 focus:ring-4 font-medium ">
                検索
            </button>
        </form>
        <a href="{{route('recipes.create')}}" class="focus:outline-none bg-green-500 text-white hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg shadow-md px-5 py-2.5 hover:cursor-pointer">
            レシピを投稿する
        </a>
    </div>
</section>