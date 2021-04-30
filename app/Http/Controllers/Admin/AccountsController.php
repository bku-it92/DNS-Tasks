<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnsweredQuestion;
use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AccountsController extends Controller
{
    public function index() {
        $users = User::all();

        return view('admin.accounts.index', ['users' => $users]);
    }

    public function details($id) {
        $user = User::findOrFail($id);
        $questions = Question::all()->count();
        $answers = AnsweredQuestion::all()->where('user_id', $user->id);
        $correct = $answers->where('is_correct', true)->count();
        return view('admin.accounts.details', ['user' => $user, 'questions' => $questions, 'answers' => $answers->count(), 'correct' => $correct]);
    }

    public function answers($id) {
        $user = User::findOrFail($id);
        return view('admin.accounts.answers', ['user' => $user, 'answers' => $user->answeredQuestions]);
    }

    public function create() {
        return view('admin.accounts.create');
    }

    public function edit(Request $request, $id) {
        $user = User::findOrFail($id);
        $data = $request->all();

        if (!array_key_exists('name', $data)) {
            $data['name'] = $user->name;
        }

        if (!array_key_exists('email', $data)) {
            $data['email'] = $user->email;
        }

        $this->validator($data)->validate();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();

        return redirect(route('admin.accounts.details', ['id' => $id]));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function insert(Request $request) {
        $d = $request->all();
        $usr = [
            'name' => 'IT92-' . $d['name'],
            'email' => 'IT92-' . $d['name'] . '@student.bkukr.de',
            'password' => $this->generateRandomString()
        ];

        $this->validator($usr)->validate();

        event(new Registered($user = $this->createUser($usr)));

        Log::emergency($usr['email'] . " " . $usr['password']);

        return redirect(route('admin.accounts'))->with('success', 'Account erfolgreich erstellt!');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
