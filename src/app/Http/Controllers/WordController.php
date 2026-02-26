<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use Illuminate\Support\Facades\Auth;

class WordController extends Controller
{
    public function index()
    {
        $words = auth()->user()
        ->words()
        ->latest()
        ->paginate(5);
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
}
