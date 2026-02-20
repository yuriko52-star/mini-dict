<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mini-dictアプリ</title>
    <style>svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
  }</style>
</head>
<body>
    <h1>単語一覧</h1>
    <table border="1">
        <tr>
            <th>単語</th>
            <th>意味</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        @foreach($words as $word)
        <tr>
            <td>{{ $word->word}}</td>
            <td>{{ $word->meaning }}</td>
            <td>
                <button class="btn">編集</button>
            </td>
            <td>
                <button class="btn">削除</button>
            </td>
        </tr>
        @endforeach
    </table>
    <a href="{{ route('word.create') }}">単語を登録する</a>
    {{ $words->links() }}
</body>
</html>