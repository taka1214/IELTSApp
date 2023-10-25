<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

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

        $user = Auth::user();
        $memorisedStatuses = [];

        foreach ($words as $word) {
            $wordWithMemorisedStatus = $user->words->find($word->id);
            if ($wordWithMemorisedStatus) {
                $memorisedStatuses[$word->id] = $wordWithMemorisedStatus->pivot->memorised;
            } else {
                $memorisedStatuses[$word->id] = null; // ユーザーが該当の単語と関連づけられていない場合
            }
        }

        return Inertia::render('ShuffleWords', [
            'words' => $words,
            'memorisedStatuses' => $memorisedStatuses
        ]);
    }

    public function updateMemorisedStatus(Request $request)
    {
        $wordId = $request->input('wordId');
        $status = $request->input('status');

        $user = Auth::user();
        $word = $user->words->find($wordId);

        if ($word) {
            $word->pivot->memorised = $status;
            $word->pivot->save();
        } else {
            // ユーザーと単語の関連を初めて作成する場合（例えば、多対多のリレーションを使用している場合）
            $user->words()->attach($wordId, ['memorised' => $status]);
        }

        return response()->json(['message' => 'Updated successfully']);
    }

    public function wordDetail($id)
    {
        $word = Word::find($id);

        if (!$word) {
            return response()->json(['message' => 'Word not found'], 404);
        }

        $user = Auth::user();
        $memorisedStatus = $user->words()->where('word_id', $id)->first()->pivot->memorised;

        return response()->json([
            'id' => $word->id,
            'english' => $word->english,
            'phonetic_symbol' => $word->phonetic_symbol,
            'english_sentence' => $word->english_sentence,
            'japanese' => $word->japanese,
            'japanese2' => $word->japanese2,
            'japanese_sentence' => $word->japanese_sentence,
            'memorised' => $memorisedStatus,
        ]);
    }
}
