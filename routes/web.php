<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::name('tasks.')->prefix('/tasks')->group(function ()  {
    // Tasks list
    Route::get('/', function ()  {
        return view('tasks.index', ['tasks' => Task::latest()->paginate(10)]);
    })->name('index');

    // Store task to database
    Route::post('/store', function (TaskRequest $request) {
        // using form request instead of duplicating validation rules
        $task = Task::create($request->validated()); // using shorthand to store model

        return redirect()->route('tasks.show', ['task' => $task->id])
            ->with('success', 'Task created successfully.');
    })->name('store');

    // Update task to database
    Route::put('/{task}', function (Task $task, TaskRequest $request) { // route model binding to automatically fetch model data
        // using form request instead of duplicating validation rules
        $task->update($request->validated()); // using shorthand to update model

        return redirect()->route('tasks.show', ['task' => $task->id])
            ->with('success', 'Task updated successfully.');
    })->name('update');

    // Show create form
    Route::view('/create', 'tasks.create')->name('create');

    // Show edit form
    Route::get('/{task}/edit', function(Task $task){
        return view('tasks.edit', ['task' => $task]);
    })->name('edit');

    // Show task detail page
    Route::get('/{task}', function (Task $task) {
        return view('tasks.show', ['task' => $task]);
    })->name('show');

    // Delete model
    Route::delete('/{task}', function (Task $task) {
        $task->delete();
        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully');
    })->name('destroy');

    Route::put('/{task}/toggle-complete', function (Task $task) {
        $task->toggleCompleted();
        return redirect()->back()
            ->with('success', 'Task toggled successfully');
    })->name('toggleComplete');
});
