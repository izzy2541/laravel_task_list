<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route("tasks.index");
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => \App\Models\Task::latest()->get()
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) {
    //find is an inbuilt method which lets you fetch a row from the database
    return view('show', [
        //find or fail will return 404 page if nothing can be found
        'task' => \App\Models\Task::findOrFail($id)
    ]);
})->name('tasks.show');


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
