<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mini-dictアプリ</title>
</head>
<body>
    <h1>Mini-Dictアプリへようこそ</h1>
    <h2>単語と意味を入力してね!</h2>
    <h3>意味を調べたいときはこちらをクリックしてください</h3>
    <a href="https://eow.alc.co.jp/" class="" target="_blank">英次郎へ</a>
    <a href="{{route('word.index')}}" class="">単語一覧へ</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn">ログアウト</button>
    </form>
    <form action="{{ route('word.store') }}" method="POST">
        @csrf
        <label for="" class="tab">単語</label>
        <input type="text" name="word" class="input" value="" placeholder="英単語を入力してください">
        <label for="" class="tab">意味</label>
        <input type="text" name="meaning" class="input" value="" placeholder="意味を入力してください">

        <button type="submit"class="btn">登録</button>
    </form>
</body>
</html>