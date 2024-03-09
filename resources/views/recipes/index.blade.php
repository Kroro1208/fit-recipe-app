<x-app-layout>
    <div class="grid grid-cols-3 gap-2">
        <div class="col-span-2 bg-sky-200 rounded-xl p-4 mb-4">
            @foreach($recipes as $recipe)
                @include('recipes.partial.card')
            @endforeach
            <a href="{{route('home')}}" class="text-white block text-center text-xl border border-gray-400 rounded-xl bg-gray-800 shadow-md py-2 px-3 hover:bg-slate-500 hover:text-white">ホーム画面へ戻る</a>
        </div>
        <div class="col-span-1 bg-white rounded-xl">
            form
        </div>
    </div>
</x-app-layout>
