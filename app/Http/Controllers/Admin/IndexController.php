<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnsweredQuestion;
use App\Models\Question;
use App\Models\User;

class IndexController extends Controller
{
    public function index() {
        return view('admin.home', ['accounts' => User::all()->count(), 'questions' => Question::all()->count(), 'answered' => AnsweredQuestion::all()->where('answer', '<>', '')->count()]);
    }
}
