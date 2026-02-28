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
    <div class="">
    <form action="{{ route('word.index') }}" method="GET">
        @csrf
        <input type="text" class="input" name="keyword">
        <button class="btn" type="submit">検索</button>
    </form>
    </div>
    <a href="{{route('word.index', ['keyword' => request('keyword'), 'sort' => 'word']) }}" class="">アルファベット順</a>
    
    <a href="{{ route('word.index', ['keyword' => request('keyword'), 'sort' => 'latest']) }}" class="">最新順</a>
    <table border="1">
        <tr>
            <th>単語</th>
            <th>意味</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        @foreach($words as $word)
        <tr>
            <form action="{{ route('word.update') }}" method="POST">
                @method('PATCH')
                @csrf
            
            <td>
                <input type="text" name="word" class="input" value="{{ $word->word}}">
                <input type="hidden" name="id" value="{{ $word->id }}">
            </td>
            <td>
                <input type="text" class="input" name="meaning" value="{{ $word->meaning}}">
                <input type="hidden" name="id" value="{{ $word->id }}">
               </td>
            <td>
                <button class="btn">編集</button>
            </td>
            </form>
            <form action="{{ route('word.delete') }}" method="POST">
                    @method('DELETE')
                    @csrf
                
            <td>
                <input type="hidden" name="id" value="{{ $word->id }}">
                <button class="btn">削除</button>
            </td>
            </form>
        </tr>
        @endforeach
    </table>
    <a href="{{ route('word.create') }}">単語を登録する</a>
    {{ $words->links() }}
</body>
</html>