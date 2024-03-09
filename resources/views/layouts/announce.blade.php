<section class="flex justify-between bg-sky-200 shadow h-20 py-2 border-b-2 items-center rounded-lg ">
    <div class="container mx-auto font-semibold">
        <p>あなたの理想のレシピが見つかります</p>
    </div>
    <div class="flex">
        @auth
            <a href="{{route('profile.edit')}}" class="mr-10 text-xl border border-gray-400 rounded-xl bg-gray-800 text-white shadow-md py-2 px-3 hover:bg-slate-500 hover:text-white">Profile</a>
        @endauth
        @guest
            <a href="{{route('register')}}" class="mr-2">ユーザー登録（無料）</a>
            <a href="{{route('login')}}">ログイン</a>
        @endguest
    </div>
</section>