<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use Illuminate\Support\Facades\Auth;

class WordController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $sort = $request->sort ?? 'latest';
        $query = auth()->user()
            ->words()
            ->when($keyword, function ($query, $keyword) {
                $query->where(function($q) use ($keyword) {
                    $q->where('word','like', "%{$keyword}%")
                    ->orWhere('meaning', 'like', "%{$keyword}%");
                });
                
            });
            /*->latest()
            ->paginate(5)
            ->withQueryString();*/
            // 並び替え
            if($sort === 'word') {
                $query->orderBy('word', 'asc');
            
            } else {
                $query->latest();
            }
            
            // ->latest()
            // ->paginate(5)
            // ->withQueryString();
         $words = $query->paginate(5)->withQueryString();
        return view('list', compact('words'));

    }
    public function create()
    {
        return view('word');
    }
    public function store(Request $request)
    {
        Word::create([
            'word' => $request->word,
            'meaning' => $request->meaning,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('word.index');
    }
    public function update(Request $request)
    {
        $word = $request->only(['word', 'meaning']);
        Word::find($request->id)->update($word);

        return redirect()->route('word.index');
    }

    public function destroy(Request $request)
    {
        Word::find($request->id)->delete();
        return redirect()->route('word.index');
    }
    /*public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if(!empty($keyword)) {
            $words->where('word', 'LIKE', "%{$keyword}%")->get();
        }
        return redirect()->route('word.index');
    }
        */
}
