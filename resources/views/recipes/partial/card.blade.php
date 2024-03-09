<a href="{{route('recipes.show', ['recipe'=>$recipe['id']])}}" class="flex flex-col items-center bg-white mb-6 border border-gray-200 rounded-xl shadow-md md:flex-row md-max-w-xl hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition duration-300 ease-in-out">
    <img src="{{$recipe->image}}" alt="{{$recipe->title}} " class="object-cover rounded-t-xl h-40 w-40 rounded-l-xl">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-800">{{$recipe->title}}</h5>
        <p  class="mb-3 font-normal">{{$recipe->description}}</p>
        <div class="flex">
            <p class="font-bold mr-2">{{$recipe->name}}</p>
            <p class="text-gray-500">{{$recipe->created_at->format('Y年m月d日')}}</p>
        </div>
    </div>
</a>