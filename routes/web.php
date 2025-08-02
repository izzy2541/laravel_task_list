<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;



Route::get('/', function () {
    return redirect()->route("tasks.index");
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

//This route needs to go above the /tasks/id route otherwise it will be caught
//, thinking that "create" is an id
Route::view('tasks/create', 'create')
->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    //find is an inbuilt method which lets you fetch a row from the database
    return view('edit', [
        //find or fail will return 404 page if nothing can be found
        'task' => $task
    ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    //find is an inbuilt method which lets you fetch a row from the database
    return view('show', [
        //find or fail will return 404 page if nothing can be found
        'task' => $task
    ]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
    // "with" method lets you set session data
    //here we're setting variable called "success" which we parse into app.blade.php
    //is a flash temporary message to show message after redirect (task saved)
    ->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])
    // "with" method lets you set session data
    //here we're setting variable called "success" which we parse into app.blade.php
    //is a flash temporary message to show message after redirect (task saved)
    ->with('success', 'Task updated successfully!');
})->name('tasks.update');

//fetch task using route model binding
Route::delete('/tasks/{task}', function (Task $task) {
    //then delete it
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');
// Route::get('/xxx', function () {
//     return "Hello";
// })->name('hello');

// Route::get('/hallo', function () {
//     return redirect()->route('hello');
// })->name('hello');

// Route::get('/greet/{name}', function ($name) {
//     return 'Hello ' . $name . '!';
// });

// Route::fallback(function () {
//     return "Still got somewhere!";
// });
