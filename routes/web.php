<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



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

Route::get('/tasks/{id}', function ($id) {
    //find is an inbuilt method which lets you fetch a row from the database
    return view('show', [
        //find or fail will return 404 page if nothing can be found
        'task' => Task::findOrFail($id)
    ]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:225',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id])
    // "with" method lets you set session data
    //here we're setting variable called "success" which we parse into app.blade.php
    //is a flash temporary message to show message after redirect (task saved)
    ->with('success', 'Task created successfully!');
})->name('tasks.store');


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
