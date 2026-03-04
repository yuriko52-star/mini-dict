<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>mini-dictアプリ</title>
</head>
<body class="">
    <header class="flex bg-blue-500 md:bg-purple-800 px-10 py-4 md:py-6 font-bold justify-between">
        <h1 class="md:text-2xl md:text-white">Mini-Dictアプリ</h1>
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="md:text-2xl md:text-white">ログアウト</button>
    </form>
    </header>
    <div class="text-center py-20  mx-auto">
    <h1 class=" text-3xl md:text-4xl font-bold mb-4">Mini-Dictアプリへようこそ</h1>
    <h2 class="text-2xl md:text-3xl">単語と意味を入力してね!</h2>
    <h3 class="pt-20 pb-10 md:text-2xl">意味を調べたいときはこちらをクリックしてください</h3>
    <a href="https://eow.alc.co.jp/" class="bg-red-400 px-5 md:bg-red-800 md:px-7 py-3 md:py-5 md:mr-20 mb-20 inline-block rounded md:text-xl  text-white font-bold" target="_blank">英次郎へ</a>
    <a href="{{route('word.index')}}" class="bg-blue-400 md:bg-blue-800 px-4 md:px-6 md:py-5 py-3 font-bold inline-block rounded text-white md:text-xl">単語一覧へ</a>
    
    <form action="{{ route('word.store') }}" method="POST">
        @csrf
        <label for="" class="mx-5 block md:text-xl">単語</label>
        <div class="inline-block mb-10">
            <input type="text" name="word" class="bg-slate-50 md:bg-white rounded  pr-20 md:py-4 md:pr-60 text-left md:border-black md:text-xl" value="" placeholder="英単語を入力してください">
        </div>
        <label for="" class="block md:text-xl">意味</label>
        <div class="block mb-10">
            <input type="text" name="meaning" class="bg-slate-50 md:bg-white md:border-black rounded pr-20 md:pr-60 md:py-4 md:text-xl" value="" placeholder="意味を入力してください">
        </div>
        <button type="submit"class="bg-red-400 md:bg-red-800  px-6 md:px-10 py-3  md:py-5 rounded-md text-white font-bold md:text-2xl">登録</button>
    </form>
    </div>
</body>
</html>