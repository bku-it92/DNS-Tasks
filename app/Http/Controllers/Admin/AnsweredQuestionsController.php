<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnsweredQuestion;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class AnsweredQuestionsController extends Controller
{
    public function index() {
        $questions = Question::all();
        $user = User::all()->count();

        return view('admin.answers.index', ['questions' => $questions, 'user' => $user]);
    }

    public function state(Request $request, $id) {
        $question = AnsweredQuestion::findOrFail($id);
        $data = $request->all();

        if (!array_key_exists('state', $data)) {
            throw new BadRequestException();
        }

        $question->is_correct = filter_var($data['state'], FILTER_VALIDATE_BOOLEAN);
        $question->save();

        return new JsonResponse();
    }
}
