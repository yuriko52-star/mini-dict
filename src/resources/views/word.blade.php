<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>mini-dictアプリ</title>
</head>
<body class="">
    <header class="flex bg-green-300  px-10 py-4 font-bold justify-between">
        <h1 class="">Mini-Dictアプリ</h1>
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn">ログアウト</button>
    </form>
    </header>
    <div class="text-center py-20 max-w-lg mx-auto">
    <h1 class=" text-3xl font-bold mb-4">Mini-Dictアプリへようこそ</h1>
    <h2 class="text-2xl">単語と意味を入力してね!</h2>
    <h3 class="pt-20 pb-10">意味を調べたいときはこちらをクリックしてください</h3>
    <a href="https://eow.alc.co.jp/" class="bg-red-400 px-5 py-3 mb-20 inline-block rounded text-white font-bold" target="_blank">英次郎へ</a>
    <a href="{{route('word.index')}}" class="bg-blue-400 px-4 py-3 font-bold inline-block rounded text-white">単語一覧へ</a>
    {{--<form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn">ログアウト</button>
    </form>--}}
    <form action="{{ route('word.store') }}" method="POST">
        @csrf
        <label for="" class="mx-5 block">単語</label>
        <div class="inline-block mb-10">
            <input type="text" name="word" class="bg-slate-50 rounded  pr-20 text-left" value="" placeholder="英単語を入力してください">
        </div>
        <label for="" class="block">意味</label>
        <div class="block mb-10">
            <input type="text" name="meaning" class="bg-slate-50 rounded pr-20" value="" placeholder="意味を入力してください">
        </div>
        <button type="submit"class="bg-red-400 px-6 py-3  rounded-md text-white font-bold">登録</button>
    </form>
    </div>
</body>
</html>