<?php

Route::get('/', [App\Http\Controllers\Admin\IndexController::class, 'index'])->name('admin');

Route::prefix('accounts')->group(function() {
    Route::get('', [App\Http\Controllers\Admin\AccountsController::class, 'index'])->name('admin.accounts');
    Route::get('create', [App\Http\Controllers\Admin\AccountsController::class, 'create'])->name('admin.accounts.create');
    Route::post('create', [App\Http\Controllers\Admin\AccountsController::class, 'insert'])->name('admin.accounts.create');
    Route::get('details/{id}', [App\Http\Controllers\Admin\AccountsController::class, 'details'])->name('admin.accounts.details');
    Route::get('details/{id}/answers', [App\Http\Controllers\Admin\AccountsController::class, 'answers'])->name('admin.accounts.details.answers');
    Route::post('details/{id}/edit', [App\Http\Controllers\Admin\AccountsController::class, 'edit'])->name('admin.accounts.edit');
    Route::post('details/{id}/answers/{questionId}', [App\Http\Controllers\Admin\AccountsController::class, 'answers'])->name('admin.accounts.details.answers.edit');
});

Route::prefix('questions')->group(function() {
    Route::get('', [App\Http\Controllers\Admin\QuestionsController::class, 'index'])->name('admin.questions');
    Route::get('create', [App\Http\Controllers\Admin\QuestionsController::class, 'create'])->name('admin.questions.create');
    Route::post('create', [App\Http\Controllers\Admin\QuestionsController::class, 'insert'])->name('admin.questions.create');
    Route::get('details/{id}', [App\Http\Controllers\Admin\QuestionsController::class, 'details'])->name('admin.questions.details');
    Route::post('details/{id}/edit', [App\Http\Controllers\Admin\QuestionsController::class, 'edit'])->name('admin.questions.edit');
});

Route::prefix('answered')->group(function() {
    Route::get('', [App\Http\Controllers\Admin\AnsweredQuestionsController::class, 'index'])->name('admin.answered');
    Route::get('details/{id}', [App\Http\Controllers\Admin\AnsweredQuestionsController::class, 'details'])->name('admin.answered.details');
    Route::post('details/{id}/state', [App\Http\Controllers\Admin\AnsweredQuestionsController::class, 'state'])->name('admin.answered.state');
});
