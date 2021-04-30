<?php

namespace App\Http\Controllers;

use App\Models\AnsweredQuestion;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function index() {
        $user = Auth::user();
        $questions = Question::all();
        $answered = $user->answeredQuestions()->get();

        foreach ($answered as $answer) {
            $questions[$answer->question_id - 1]['given_answer'] = $answer->answer;
            $questions[$answer->question_id - 1]['is_correct'] = $answer->is_correct;
        }

        return view('tests.index', ['questions' => $questions]);
    }

    public function answer(Request $request, $id) {
        $answer = $request->only(['answer']);
        $question = Question::firstWhere('id', $id);
        if ($question == null) {
            return new JsonResponse(null, 404);
        }

        $user = Auth::user();
        $answered = AnsweredQuestion::firstWhere(['question_id' => $id, 'user_id' => $user->id]);
        if ($answered == null) {
            $answered = AnsweredQuestion::create([
                'question_id' => $id,
                'user_id' => $user->id,
                'answer' => $answer['answer'],
                'is_correct' => $answer['answer'] == $question->answer
            ]);
        }

        $answered->answer = $answer['answer'];
        $answered->is_correct = $answer['answer'] == $question->answer;
        $answered->save();

        return new JsonResponse($answered);
    }
}
