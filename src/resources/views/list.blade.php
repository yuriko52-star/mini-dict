<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>mini-dictアプリ</title>
    <style>svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
  }</style>
</head>
<body>
    <header class="flex bg-blue-500 md:bg-purple-800 px-10 py-4 md:py-6 font-bold justify-between">
        <h1 class="md:text-2xl md:text-white">Mini-Dictアプリ</h1>
        <form method="POST" action="{{ route('logout') }}">
        @csrf
            <button type="submit" class="md:text-2xl md:text-white">ログアウト</button>
        </form>
    </header>
    <div class="text-center py-20 max-w-4xl mx-auto">
    <h1 class=" text-3xl md:text-4xl font-bold mb-4 text-center">単語一覧</h1>
    
    <form action="{{ route('word.index') }}" method="GET">
        @csrf
        <input type="text" class="bg-slate-50 md:bg-white rounded  px-2 py-2  text-left md:border-black md:text-xl" name="keyword" placeholder="アルファベットを入力してね">
        <button class="bg-blue-400 md:bg-blue-800  ml-5 px-4 py-2 font-bold inline-block rounded text-white md:text-xl" type="submit">検索</button>
    </form>
    
    <div class="flex justify-center gap-6  my-10">
        <a href="{{route('word.index', ['keyword' => request('keyword'), 'sort' => 'word']) }}" class="text-blue-500 border-b-4 font-bold inline-block  md:text-xl">アルファベット順</a>
    
        <a href="{{ route('word.index', ['keyword' => request('keyword'), 'sort' => 'latest']) }}" class=" text-blue-500 border-b-4 font-bold inline-block  md:text-xl">最新順</a>
    </div>

    <div class="max-w-4xl mx-auto space-y-4">
    @foreach($words as $word)
        <div class="flex justify-center">
         <div class="grid grid-cols-[auto_1fr] md:grid-cols-[auto_1fr_auto_1fr_auto_auto] md:items-center gap-2">   
      
            <form action="{{ route('word.update') }}" method="POST" class="contents">
                @method('PATCH')
                @csrf
            
           
                <label for="" class="">単語</label>
                <input type="text" name="word" class="w-full bg-slate-50 md:bg-white rounded  px-2 py-2 text-left  md:text-xl" value="{{ $word->word}}">
                <label for="" class="">意味</label>
                <input type="hidden" name="id" value="{{ $word->id }}">
            
                <input type="text" class="w-full bg-slate-50 md:bg-white rounded  px-2 py-2  text-left md:text-xl" name="meaning" value="{{ $word->meaning}}">
                <input type="hidden" name="id" value="{{ $word->id }}">
              
           <div class="col-start-2 flex items-center gap-2 md:col-auto">
                <button class="col-start-2 bg-blue-400 md:bg-blue-800 px-4 py-2 font-bold  rounded text-white  ml-5">編集</button>
            
            </form>
            <form action="{{ route('word.delete') }}" method="POST">
                    @method('DELETE')
                    @csrf
                
           
                <input type="hidden" name="id" value="{{ $word->id }}">
                <button class="col-start-2 bg-red-400 md:bg-red-800 px-4  py-2 font-bold  rounded text-white">削除</button>
            
            </form>
           </div> 
</div>       
</div>
        @endforeach
    <!-- </table> -->
</div>
    <a href="{{ route('word.create') }}" class="text-blue-500 border-b-4 font-bold inline-block mt-10 md:text-xl">単語登録ページへ</a>
    {{ $words->links() }}
</div>
</body>
</html>