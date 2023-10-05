<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;

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
}
