<section class="flex justify-between bg-sky-200 shadow h-20 py-2 border-b-2 items-center rounded-lg ">
    <div class="container mx-auto font-semibold">
        <p>あなたの理想のレシピが見つかります</p>
    </div>
    <div class="flex mr-10 gap-3">
        @auth
            <a href="{{route('profile.edit')}}" class="mr-10 text-xl border border-slate-400 rounded-xl bg-sky-200 py-2 px-4 shadow-lg hover:-translate-y-0.5 duration-300">Profile</a>
        @endauth
        @guest
            <a href="{{route('register')}}" class="mr-5 border border-slate-300 px-3 py-4 rounded-lg shadow-lg hover:-translate-y-0.5 duration-300">ユーザー登録（無料）</a>
            <a href="{{route('login')}}" class="mr-5 border border-slate-300 px-4 py-4 rounded-lg shadow-lg hover:-translate-y-0.5 duration-300">ログイン</a>
        @endguest
    </div>
</section>