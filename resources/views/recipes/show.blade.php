<x-app-layout>
    <div>
        <div class="mb-3">
            {{Breadcrumbs::render('recipes.show', $recipe)}}
        </div>
        <div class="mx-auto rounded-xl">
            <div class="grid grid-cols-2 h-50 rounded-xl border bg-white border-gray-200">
                <div class="col-span-1">
                    <img class="object-cover rounded-l-xl h-50 w-full " src="{{$recipe->image}}" alt="{{$recipe->title}}">
                </div>
                <div class="col-span-1 p-3">
                    <h4 class="text-2xl font-bold mb-2">{{$recipe->title}}</h4>
                    <p class="text-lg font-semibold">{{$recipe->user->name}}</p>
                    <p class="text-xl font-bold mb-2 mt-2">材料</p>
                        <ul>
                        @foreach ( $recipe->ingredients as $i)
                            <li>{{$i->name}}:{{$i->quantity}}</li>
                        @endforeach
                        </ul>
                    <p class="mt-2">{{$recipe->description}}</p>
                </div>
            </div>
            <br>
            <div class="">
                <h4 class="text-2xl font-bold mb-2">作り方</h4>
                <ul>
                    @foreach ($recipe->steps as $s)
                    <div class="flex items-center mb-2">
                        <div class="w-10 h-10 flex items-center justify-center bg-gray-400 rounded-full mr-4">
                            {{$s->step_number}}
                        </div>
                        <p>{{$s->description}}</p>
                    </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>