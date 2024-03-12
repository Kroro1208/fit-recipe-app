<x-app-layout>
    <div>
        <div class="mb-3">
            {{Breadcrumbs::render('recipes.show', $recipe)}}
        </div>
        <div class="w-10/12 p-4 mx-auto bg-white rounded-xl">
            <div class="grid grid-cols-2 rounded-xl border bg-white border-gray-200">
                <div class="col-span-1">
                    <img class="object-cover aspect-square rounded-l-xl w-full " src="{{$recipe->image}}" alt="{{$recipe->title}}">
                </div>
                <div class="col-span-1 p-3">
                    <div class="flex gap-5 items-center">
                        <h4 class="text-2xl font-bold mb-2">{{$recipe->title}}</h4>
                        <p class="text-md font-semibold">by {{$recipe->user->name}}</p>
                    </div>
                    <p class="text-xl font-bold mb-2 mt-2">材料</p>
                        <ul>
                        @foreach ( $recipe->ingredients as $i)
                            <li>{{$i->name}}:{{$i->quantity}}</li>
                        @endforeach
                        </ul>
                    <p class="text-xl font-semibold mt-4">レシピの説明</p>
                    <p class="mt-2">{{$recipe->description}}</p>
                </div>
            </div>
            <br>
            <div class="">
                <h4 class="text-2xl font-bold mb-6">作り方</h4>
                <div class="grid grid-cols-4 gap-2">
                    @foreach ($recipe->steps as $s)
                        <div class="items-center mb-2 rounded-xl background-color p-3">
                            <div class="w-8 h-8 flex items-center justify-center bg-blue-500 text-white rounded-full mb-2">
                                {{$s->step_number}}
                            </div>
                            <p>{{$s->description}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="w-10/12 p-4 mx-auto bg-white rounded-xl">
            <h4 class="text-2xl font-bold mb-2">レビュー</h4>
            @if (count($recipe->reviews)===0)
                <p>レビューはまだありません</p>
            @endif
            @foreach ($recipe->reviews as $r)
                <div class="background-color rounded p-4 mb-4">
                    <div class="flex">
                        @for($i=0; $i < $r->rating; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>                          
                        @endfor
                        <div class="flex gap-5 ml-3">
                            <p class="font-semibold">{{$r->comment}}</p>
                            <p>{{$r->user->name}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>