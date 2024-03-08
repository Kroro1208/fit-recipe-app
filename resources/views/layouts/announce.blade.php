<section class="flex justify-between bg-white shadow h-10 py-2 border-b-2">
    <div class="container mx-auto ">
        <p>これはアナウンスです</p>
    </div>
    <div class="flex justify-center">
        @auth
            <a href="{{route('profile.edit')}}" class="mr-10">マイページ</a>
        @endauth
        @guest
            <a href="{{route('register')}}" class="mr-2">ユーザー登録（無料）</a>
            <a href="{{route('login')}}">ログイン</a>
        @endguest
    </div>
</section>