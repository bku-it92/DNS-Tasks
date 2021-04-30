<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionsController extends Controller
{
    public function index() {
        $questions = Question::all();

        return view('admin.questions.index', ['questions' => $questions]);
    }

    public function details($id) {
        $question = Question::findOrFail($id);
        return view('admin.questions.details', ['question' => $question]);
    }

    public function create() {
        return view('admin.questions.create');
    }

    public function edit(Request $request, $id) {
        $question = Question::findOrFail($id);
        $data = $request->all();

        if (!array_key_exists('question', $data)) {
            $data['question'] = $question->question;
        }

        if (!array_key_exists('answer', $data)) {
            $data['answer'] = $question->answer;
        }

        $this->validator($data)->validate();

        $question->question = $data['question'];
        $question->answer = $data['answer'];
        $question->save();

        return redirect(route('admin.questions.details', ['id' => $id]));
    }

    public function insert(Request $request) {
        $data = $request->all();

        $this->validator($data)->validate();

        Question::create($data);

        return redirect(route('admin.questions'))->with('success', 'Frage erfolgreich erstellt!');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string', 'max:255'],
        ]);
    }
}
