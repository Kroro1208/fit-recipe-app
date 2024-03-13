<x-app-layout>
    <x-slot name="script">
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
        <script src="/js/recipe/create.js"></script>
    </x-slot>
    <form method="POST" action="{{route('recipes.store')}}" enctype="multipart/form-data"
    class="w-10/12 p-4 mx-auto bg-white rounded-xl">
        @csrf
        <div class="mb-3">
            {{Breadcrumbs::render('recipes.create')}}
        </div>
        <div class="grid grid-cols-2 rounded-xl bg-white">
            <div class="col-span-1">
                <img class="object-cover rounded-l-xl w-full aspect-video" src="" alt="recipe-image">
                <input type="file" id="image" name="image" class="border border-gray-300 p-2 mb-4 w-full rounded-xl">
            </div>

            <div class="col-span-1 p-3">
                <input type="text" name="title" value="{{old('title')}}" placeholder="レシピ名を入力" class="rounded-xl border border-gray-300 p-2 mb-4 w-full">
                <textarea name="description" placeholder="レシピ名の概要" cols="30" rows="10" class="rounded-xl border border-gray-300 p-2 mb-4 w-full">{{old('description')}}</textarea>
                <select name="category" id="category" class="border border-gray-300 p-2 mb-4 w-full rounded-xl">
                    <option value="">カテゴリーを選ぶ</option>
                    @foreach ($categories as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
                <h4 class="text-bold text-xl mb-4">材料を入力</h4>
                <div id="ingredients">
                    @php
                        $old_ingredients = old('ingredients') ?? null;
                    @endphp

                    @if (is_null($old_ingredients))
                        @for ($i = 0; $i < 3; $i ++)
                        <div class="ingredient flex items-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="handle w-6 h-6 mr-2 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <input type="text" name="ingredients[{{$i}}]->name" placeholder="材料名" class="ingredient-name border border-gray-300 ml-4 w-full rounded-xl">                        
                            <p class="mx-2">:</p>
                            <input type="text" name="ingredients[{{$i}}]->quantity" placeholder="分量" class="ingredient-quantity border border-gray-300 p-2 w-full rounded-xl">                        
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </div>
                        @endfor
                    @else
                        @foreach ($old_ingredients as $i => $oi)
                        <div class="ingredient flex items-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="handle w-6 h-6 mr-2 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <input type="text" name="ingredients[{{$i}}]->name" value="{{$oi->name}}" placeholder="材料名" class="ingredient-name border border-gray-300 ml-4 w-full rounded-xl">                        
                            <p class="mx-2">:</p>
                            <input type="text" name="ingredients[{{$i}}]->quantity" value="{{$oi->quantity}}" placeholder="分量" class="ingredient-quantity border border-gray-300 p-2 w-full rounded-xl">                        
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </div>   
                        @endforeach
                    @endif
                </div>
                <button type="button" id="ingredient-add" class="bg-gray-500 hover:bg-slate-700 text-white font-bold py-2 px-4 rounded-xl">
                    材料を追加する</button>
                <div class="flex justify-end">
                    <button type="submit" class="mt-5 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-xl">
                        レシピを投稿する</button>
                </div>
            </div>
        </div>
        <hr class="my-4 border-t-2 border-gray-300">
        <h4 class="font-bold text-xl text-center mb-4">手順を入力</h4>
        <div id="steps">
            @php
                $old_steps = old('steps') ?? null;
            @endphp
            @if (is_null($old_steps))
                @for ($i =1; $i < 4; $i ++)
                <div class="step flex justify-between items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="handle w-6 h-6 mr-2 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <p class="step_number w-16">手順 {{$i}}</p>
                    <input type="text" name="steps[]" placeholder="手順を入力してください" class="border border-gray-300 py-2 w-full rounded-xl">                        
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="step-delete w-6 h-6 ml-3 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </div>
                @endfor
            @endif
        </div>
    </form>
</x-app-layout>



