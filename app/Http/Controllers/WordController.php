<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use Inertia\Inertia;

class WordController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('level')) {
            $words = Word::where('level', $request->level)->get();
        } else {
            $words = Word::all();
        }
        return response()->json($words);
    }

    public function shuffle(Request $request)
    {
        if ($request->has('level')) {
            $words = Word::where('level', $request->level)->get();
        } else {
            $words = Word::all();
        }

        return Inertia::render('ShuffleWords', [
            'words' => $words
        ]);
    }
}
